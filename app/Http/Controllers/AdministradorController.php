<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')
                ->where('tipo', 'A')->get();
        // return $users;
        return view('Admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $users = Persona::all();

        // $roles = Role::all();

        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = new User();
        $users->ci = $request->get('ci');
        $users->nombre = $request->get('name');
        $users->apellido = $request->get('apellido');
        $users->sexo = $request->get('sexo');
        $users->fecha_nac = $request->get('fecha_nac');
        $users->telefono = $request->get('telefono');
        $users->password = bcrypt($request->get('password'));
        $users->email = $request->get('email');
        $users->tipo = 'A';
        // $users->foto = $request->get('foto');
        $users->save();
        // $users->assignRole($request->rol); //crear rol
        // $users->syncRoles($request->rol);//sincronizar rol
        //    return redirect()->route('users.edit', $users)->with('info', 'Se asignó los roles correctamente');

        // User::create($request->all());
        $administradors= new administrador();
        $administradors->user_id = $users->id;
        $administradors->save();
        return redirect()->route('administradors.index')->with('info', 'Se creó un nuevo usuario'); //redirige a la vista index de la carpeta cargo
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function show(Administrador $administrador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = DB::table('users')
                ->where('id', $id)->first();
        return view('admin.user.edit', compact('users'));
        // return view('user.edit', compact('user', 'users'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ci)
    {
        $user = User::find($ci);
        $user->nombre = $request->get('name');
        $user->apellido = $request->get('apellido');
        $user->email = $request->get('email');
        // $user->save();
        // $user->syncRoles($request->rol); //sincronizar rol
        $user->ci = $request->get('ci');
        $user->nombre = $request->get('name');
        $user->apellido = $request->get('apellido');
        $user->sexo = $request->get('sexo');
        $user->fecha_nac = $request->get('fecha_nac');
        $user->telefono = $request->get('telefono');
        
        if ($request->password != 'xxxxxxxxx') {
            $user->password = bcrypt($request->get('password'));
        }
        $user->email = $request->get('email');
        // $users->foto = $request->get('foto');
        $user->save();
        // $users->assignRole($request->rol); //crear rol
        // $users->syncRoles($request->rol);//sincronizar rol
        //    return redirect()->route('users.edit', $users)->with('info', 'Se asignó los roles correctamente');


        return redirect()->route('administradors.index')->with('info', 'Se editó el usuario correctamente');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // activity()->useLog('Usuario')->log('Eliminado')->subject();
        // $lastActivity = Activity::all()->last();
        // $lastActivity->subject_id = User::all()->last()->id;
        // $lastActivity->save();

        DB::table('administradors')->where('user_id', $id)->delete();

        DB::table('users')->where('id', $id)->delete();

        return redirect()->route('administradors.index')->with('info', 'Usuario eliminado');
    }
}
