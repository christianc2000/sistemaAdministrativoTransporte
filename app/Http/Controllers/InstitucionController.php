<?php

namespace App\Http\Controllers;

use App\Models\Institucion;
use Illuminate\Http\Request;

class InstitucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $institucions = Institucion::all();
        
        return view('Admin.institucion.index', compact('institucions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.institucion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $institucion = new Institucion();
        $institucion->nombre = $request->get('name');
        $institucion->direccion = $request->get('direccion');
        $institucion->telefono = $request->get('telefono');
        $institucion->administrador_id = auth()->id();
        $institucion->save();
        return redirect()->route('institucions.index')->with('info', 'Se creó una nueva institucion'); //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function show(Institucion $institucion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function edit(Institucion $institucion)
    {
        return view('admin.institucion.edit', compact('institucion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Institucion $institucion)
    {
        $institucion->nombre= $request->get('name');
        $institucion->direccion= $request->get('direccion');
        $institucion->telefono= $request->get('telefono');

        $institucion->save();
        return redirect()->route('institucions.index')->with('info', 'Se Editó la institucion'); //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Institucion $institucion)
    {
        $institucion->delete();
        return redirect()->route('institucions.index')->with('info', 'Se eliminó la institucion'); //

    }
}
