<?php

namespace App\Http\Controllers;

use App\Models\Duenio;
use App\Models\DuenioLinea;
use App\Models\Lineas;
use Illuminate\Http\Request;

class DuenioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $duenios = Duenio::all();
        $lineas=Lineas::all();
        return view('Admin.user.duenios.index', compact('duenios','lineas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lineas = Lineas::all()->sortByDesc('nrolinea');
        return view('Admin.user.duenios.create', compact('lineas'));
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
            'ci' => 'required|string|unique:duenios',
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'sexo' => 'required|string|max:1',
            'fecha_nac' => 'required|date',
            'email' => 'required|email|unique:duenios',
            'telefono' => 'required|integer',
            'linea_id' => 'required|integer'
        ]);
        $duenio = new Duenio();

        $duenio->ci = $request->ci;
        $duenio->nombre = $request->nombre;
        $duenio->apellido = $request->apellido;
        $duenio->sexo = $request->sexo;
        $duenio->fecha_nac = $request->fecha_nac;
        $duenio->email = $request->email;
        $duenio->telefono = $request->telefono;
        
        $duenio->save();

        $dl=DuenioLinea::create([
            'linea_id'=>$request->linea_id,
            'duenio_id'=>$duenio->id,
            'aporte'=> 0,
            'fecha'=> date(now())
        ]);

        return redirect()->route('admin.duenio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Duenio  $duenio
     * @return \Illuminate\Http\Response
     */
    public function show(Duenio $duenio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Duenio  $duenio
     * @return \Illuminate\Http\Response
     */
    public function edit(Duenio $duenio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Duenio  $duenio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Duenio $duenio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Duenio  $duenio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Duenio $duenio)
    {
        //
    }
}
