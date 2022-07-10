<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Administrador;
use App\Models\AdministradorInstitucion;
use App\Models\Chofer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return response()->json([
            'status' => 1,
            'msg' => "Lista de Usuarios registrados",
            'data' => $users

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $request->validate([
            'ci' => 'required|unique:users',
            'password' => 'required|confirmed',
            'nombre' => 'required|string|max:40',
            'apellido' => 'required|string|max:40',
            'sexo' => 'required|string|max:1',
            'fecha_nac' => 'required|date',
            'telefono' => 'required|numeric',
            'email' => 'required|email|unique:users',
            'tipo' => 'required|string|max:1', //A=Administrador, I=AdministradorInstitucion, C=Conductor
            'direccion' => 'string|nullable',
            'activo' => 'boolean|nullable',
            'foto' =>  'mimes:jpg,jpeg,bmp,png|max:2048|nullable',
            'id_institucion' => 'integer|nullable'

        ]);
        $user = new User();
        $user->ci = $request->ci;
        $user->password = Hash::make($request->password);
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->sexo = $request->sexo;
        $user->fecha_nac = $request->fecha_nac;
        $user->telefono = $request->telefono;
        $user->email = $request->email;
        $user->tipo = $request->tipo;
        if ($request->hasFile('foto')) {

            $folder = "public/perfil";
            $imagen = $request->file('foto')->store($folder); //Storage::disk('local')->put($folder, $request->image, 'public');
            $url = Storage::url($imagen);
            $user->foto = $url;
        } else {
            return "no entra";
        }
        $user->save();
        $us = User::all()->find($user->id);
        $token = $user->createToken("auth_token")->plainTextToken;
        if ($request->tipo == "A" || $request->tipo == "I") {

            if ($user->tipo == "A") {
                Administrador::create(
                    [
                        'user_id' => $user->id
                    ]
                );
                return response()->json([
                    "status" => 1,
                    "msg" => "Usuario Administrador global registrado exitosamente!",
                    "data" => $user,
                    "access_token" => $token,
                    "token_type" => "Bearer"
                ]);
            } else {
                AdministradorInstitucion::create([
                    'user_id' => $user->id,
                    'id_institucion' => $request->id_institucion
                ]);
                return response()->json([
                    "status" => 1,
                    "msg" => "Usuario Administrador de institución registrado exitosamente!",
                    "data" => $user,
                    "access_token" => $token,
                    "token_type" => "Bearer"
                ]);
            }
        } else if ($request->tipo = "C") {
            $chofer = Chofer::create([
                'user_id' => $user->id,
                'direccion' => $request->direccion,
                'activo' => $request->activo
            ]);
            return response()->json([
                "status" => 1,
                "msg" => "Usuario chofer registrado exitosamente!",
                "data" => $user,
                "access_token" => $token,
                "token_type" => "Bearer"
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "No existe ese tipo de usuario"
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::all()->find($id);
        // $chofer = Chofer::FindOrFail($id);
        //return $chofer;
        if (isset($user)) {
            return response()->json([
                "status" => 1,
                "msg" => "Usuario encontrado exitosamente!",
                "data" => $user,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo, usuario con id=" . $id . " no existe en la base de datos!",
            ], 404);
        }
    }
    public function login(Request $request)
    {
        $request->validate([
            'ci' => 'required|string',
            'password' => 'required'
        ]);

        $user = User::where('ci', '=', $request->ci)->first();
        if (isset($user->id)) {

            if (Hash::check($request->password, $user->password)) {
                //creamos el token
                $token = $user->createToken("auth_token")->plainTextToken;
                //si está todo ok
                return response()->json([
                    "status" => 1,
                    "msg" => "¡Usuario logueado exitosamente!",
                    "access_token" => $token,
                    "token_type" => "Bearer",
                    "data" => $user
                ]);
            } else {
                return response()->json([
                    "status" => 0,
                    "msg" => "La password es incorrecta"
                ], 404);
            }
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Usuario no registrado"
            ], 404);
        }
    }
    public function loginget(Request $request)
    {
        return response()->json([
            "status" => 0,
            "msg" => "Necesita logguearse"
        ]);
    }
    public function profile()
    {
        $user = User::all()->find(auth()->user()->id);
        return response()->json([
            "status" => 1,
            "msg" => "Acerca del perfil de usuario",
            "data" => $user
        ]);
    }

    public function editProfile(Request $request)
    {

        $request->validate([
            'ci' => 'required',
            'password' => 'required|confirmed',
            'nombre' => 'required|string|max:40',
            'apellido' => 'required|string|max:40',
            'sexo' => 'required|string|max:1',
            'fecha_nac' => 'required|date',
            'telefono' => 'required|numeric',
            'email' => 'required|email',
            'tipo' => 'required|string|max:1', //A=Administrador, I=AdministradorInstitucion, C=Conductor
            'foto' =>  'mimes:jpg,jpeg,bmp,png|max:2048|nullable',
            'direccion' => 'nullable|string',
            'activo' => 'nullable|boolean'
        ]);

        $u = Auth::user();
        $user = User::all()->find($u->id);

        $user->ci = $request->ci;
        $user->password = Hash::make($request->password);
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->sexo = $request->sexo;
        $user->fecha_nac = $request->fecha_nac;
        $user->telefono = $request->telefono;
        $user->email = $request->email;
        $user->tipo = $request->tipo;


        if ($request->hasFile('foto')) {
            $folder = "public/perfil";
            if ($user->image != null) { //si entra es para actualizar su foto borrando la que tenía, si no tenía entonces no entra

                Storage::delete($user->foto);
            }
            $imagen = $request->file('foto')->store($folder); //Storage::disk('local')->put($folder, $request->image, 'public');
            $url = Storage::url($imagen);
            $user->image = $url;
        }
        $user->save();
        if ($user->tipo == "C") {
            $chofer = Chofer::all()->find($user->chofer->id);
           
            $chofer->direccion = $request->direccion;
            $chofer->activo = $request->activo;
            
            $chofer->save();
        }

        return response()->json([
            "status" => 1,
            "msg" => "Usuario actualizado exitosamente!",
            "data" => $user,
            "chofer" => Chofer::all()->find($user->chofer->id)
        ]);
    }
    public function logout()
    {
        $user = auth()->user();

        auth()->user()->tokens()->delete();
        return response()->json([
            "status" => 1,
            "msg" => "Cierre de Sesión",
            "data" => $user
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'ci' => 'required',
            'password' => 'required|confirmed',
            'nombre' => 'required|string|max:40',
            'apellido' => 'required|string|max:40',
            'sexo' => 'required|string|max:1',
            'fecha_nac' => 'required|date',
            'telefono' => 'required|numeric',
            'email' => 'required|email',
            'tipo' => 'required|string|max:1', //A=Administrador, I=AdministradorInstitucion, C=Conductor
            'foto' =>  'mimes:jpg,jpeg,bmp,png|max:2048|nullable',
        ]);

        $user = User::all()->find($id);
        if (isset($user)) {
            $user->ci = $request->ci;
            $user->password = Hash::make($request->password);
            $user->nombre = $request->nombre;
            $user->apellido = $request->apellido;
            $user->sexo = $request->sexo;
            $user->fecha_nac = $request->fecha_nac;
            $user->telefono = $request->telefono;
            $user->email = $request->email;
            $user->tipo = $request->tipo;


            if ($request->hasFile('foto')) {
                $folder = "public/perfil";
                if ($user->image != null) { //si entra es para actualizar su foto borrando la que tenía, si no tenía entonces no entra

                    Storage::delete($user->foto);
                }
                $imagen = $request->file('foto')->store($folder); //Storage::disk('local')->put($folder, $request->image, 'public');
                $url = Storage::url($imagen);
                $user->image = $url;
            } else {
                return "no entra";
            }
            $user->save();
            return response()->json([
                "status" => 1,
                "msg" => "Usuario actualizado exitosamente!",
                "data" => $user,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo en la actualización, usuario con id=" . $id . " no existe en la base de datos!",
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::all()->find($id);
        if (isset($user)) {
            $user->delete();
            return response()->json([
                "status" => 1,
                "msg" => "Usuario eliminado exitosamente!",
                "data" => $user,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo en la eliminación, usuario con id=" . $id . " no existe en la base de datos!",
            ], 404);
        }
    }
}
