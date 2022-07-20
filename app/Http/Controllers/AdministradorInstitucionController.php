<?php

namespace App\Http\Controllers;

use App\Models\AdministradorInstitucion;
use App\Models\Institucion;
use App\Models\User;
use Illuminate\Http\Request;

class AdministradorInstitucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::Where('tipo', 'I')->get();
        return view('Admin.adminInstitucion.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $institucions = Institucion::all();
        return view('admin.adminInstitucion.create', compact('institucions'));
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
        $users->tipo = 'I';
        // $users->foto = $request->get('foto');
        $users->save();
        // $users->assignRole($request->rol); //crear rol
        // $users->syncRoles($request->rol);//sincronizar rol
        //    return redirect()->route('users.edit', $users)->with('info', 'Se asignó los roles correctamente');

        // User::create($request->all());
        $administradors= new AdministradorInstitucion();
        $administradors->user_id = $users->id;
        $administradors->institucion_id = $request->get('institucion_id');
        $administradors->save();
        return redirect()->route('administradorInstitucions.index')->with('info', 'Se creó un nuevo usuario administrador de institucion'); //redirige a la vista index de la carpeta cargo
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdministradorInstitucion  $administradorInstitucion
     * @return \Illuminate\Http\Response
     */
    public function show(AdministradorInstitucion $administradorInstitucion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdministradorInstitucion  $administradorInstitucion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $institucions = Institucion::all();
        $adminIns = AdministradorInstitucion::where('user_id', $id)->first();
        $users= User::find($id);
        return view('admin.adminInstitucion.edit', compact('institucions', 'adminIns', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdministradorInstitucion  $administradorInstitucion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $administradorInstitucion= User::find($id);
        $administradorInstitucion->ci = $request->get('ci');
        $administradorInstitucion->nombre = $request->get('name');
        $administradorInstitucion->apellido = $request->get('apellido');
        $administradorInstitucion->sexo = $request->get('sexo');
        $administradorInstitucion->fecha_nac = $request->get('fecha_nac');
        $administradorInstitucion->telefono = $request->get('telefono');
        if ($request->password != 'xxxxxxxxx') {
            $administradorInstitucion->password = bcrypt($request->get('password'));
        }
        $administradorInstitucion->email = $request->get('email');
        $administradorInstitucion->tipo = 'I';
        // $users->foto = $request->get('foto');
        $administradorInstitucion->save();
        // $users->assignRole($request->rol); //crear rol
        // $users->syncRoles($request->rol);//sincronizar rol
        //    return redirect()->route('users.edit', $users)->with('info', 'Se asignó los roles correctamente');

        // User::create($request->all());
        $adminIns = AdministradorInstitucion::where('user_id', $administradorInstitucion->id)->first();
        $adminIns->institucion_id = $request->get('institucion_id');
        $adminIns->save();
        return redirect()->route('administradorInstitucions.index')->with('info', 'Se editó el usuario administrador de institucion'); //redirige a la vista index de la carpeta cargo
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdministradorInstitucion  $administradorInstitucion
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $administradorInstitucion)
    {
        $adminInti = AdministradorInstitucion::where('user_id', $administradorInstitucion->id)->first();
        $adminInti->delete();
        $administradorInstitucion->delete();
        return redirect()->route('administradorInstitucions.index')->with('info', 'Se eliminó el usuario administrador de institucion');
    }
}
