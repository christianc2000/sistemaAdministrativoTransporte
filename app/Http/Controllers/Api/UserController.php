<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Administrador;
use App\Models\AdministradorInstitucion;
use App\Models\Chofer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
    public function store(Request $request)
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
        $user->save();
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
