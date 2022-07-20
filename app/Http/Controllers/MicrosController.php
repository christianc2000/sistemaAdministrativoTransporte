<?php

namespace App\Http\Controllers;

use App\Models\Duenio;
use App\Models\Micro;
use App\Models\Micros;
use App\Models\PermisoLinea;
use Illuminate\Http\Request;

class MicrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $micros = Micro::all();
        return view('Admin.user.micros.index', compact('micros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $duenios = Duenio::all();
        return view('Admin.user.micros.create', compact('duenios'));
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
            'nro_interno' => 'required|numeric',
            'placa' => 'required|string',
            'modelo' => 'required|string',
            'cant_asiento' => 'required|numeric',
            //'foto.*'   =>  'image|mimes:jpg,jpeg,bmp,png|max:2048|nullable',
            'fecha_asignacion' => 'nullable|date',
            'fecha_baja' => 'nullable|date',
            'duenio_id' => 'required|numeric'
        ]);
        $duenio = Duenio::all()->find($request->duenio_id);
        $permiso = $duenio->permisoLineas->where('activo', false)->first();

        if (isset($permiso)) {
            $permiso = PermisoLinea::all()->find($permiso->id);
            $micro = Micro::create([
                'nro_interno' => $request->nro_interno,
                'placa' => $request->placa,
                'modelo' => $request->modelo,
                'cant_asiento' => $request->cant_asiento,
                'fecha_asignacion' => $request->fecha_asignacion,
                'permiso_linea_id' => $permiso->id
            ]);
            $permiso->activo = true;
            $permiso->save();
            return $micro;
        } else {
            return "no tiene permiso";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Micros  $micros
     * @return \Illuminate\Http\Response
     */
    public function show(Micros $micros)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Micros  $micros
     * @return \Illuminate\Http\Response
     */
    public function edit(Micros $micros)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Micros  $micros
     * @return \Illuminate\Http\Response
     */
    public function asignarPermiso(Request $request, $id)
    {
        return $request;
    }
    public function darBajaMicro($id)
    {
        $micro=Micro::all()->find($id);
        $permiso=PermisoLinea::all()->find($micro->permisoLinea->id);
        $permiso->activo=false;
        $permiso->save();
        $micro->fecha_baja=now();
        $cm=$micro->choferMicros->where('fecha_baja',null)->first();
        $cm->fecha_baja=now();
        $cm->save();

    }

    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Micros  $micros
     * @return \Illuminate\Http\Response
     */
    public function destroy(Micros $micros)
    {
        //
    }
}
