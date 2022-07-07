<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Micros;
use Illuminate\Http\Request;

class MicroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $micros = Micros::all();
        return response()->json([
            'status' => 1,
            'msg' => "Lista de Micros registrados",
            'data' => $micros
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
            'nro_interno' => 'required|numeric',
            'placa' => 'required|string',
            'modelo' => 'required|string',
            'cant_asiento' => 'required|numeric',
            'foto.*'   =>  'image|mimes:jpg,jpeg,bmp,png|max:2048|nullable',
            'fecha_asignacion' => 'required',
            'fecha_baja' => 'required',
            'id_permiso_linea' => 'required'
        ]);
        $micro = Micros::create($request->all());
        return response()->json([
            "status" => 1,
            "msg" => "Micro registrado exitosamente!",
            "data" => $micro,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
