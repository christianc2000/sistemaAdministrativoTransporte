<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RecorridoTarjeta;
use Illuminate\Http\Request;

class RecorridoTarjetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recorridos = RecorridoTarjeta::all();
        return response()->json([
            'status' => 1,
            'msg' => "Lista de recorridos registrados",
            'data' => $recorridos
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
            'nro_recorrido'=>'required|integer',
            'hora_partida'=>'required',
            'hora_llegada'=>'required',
            'id_tarjeta'=>'required|integer'
        ]);
        $recorrido = RecorridoTarjeta::create($request->all());
        return response()->json([
            "status" => 1,
            "msg" => "Recorrido registrado exitosamente!",
            "data" => $recorrido,
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
        $recorrido = RecorridoTarjeta::all()->find($id);

        if (isset($recorrido)) {
            return response()->json([
                "status" => 1,
                "msg" => "Recorrido encontrado exitosamente!",
                "data" => $recorrido,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo, recorrido con id=" . $id . " no existe en la base de datos!",
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
            'nro_recorrido'=>'required|integer',
            'hora_partida'=>'required',
            'hora_llegada'=>'required',
            'id_tarjeta'=>'nullable'
        ]);
        $recorrido = RecorridoTarjeta::all()->find($id);
        if (isset($recorrido)) {
            $recorrido->update($request->all());
            return response()->json([
                "status" => 1,
                "msg" => "Recorrido actualizado exitosamente!",
                "data" => $recorrido,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo en la actualización, recorrido con id=" . $id . " no existe en la base de datos!",
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
        $recorrido = RecorridoTarjeta::all()->find($id);
        if (isset($recorrido)) {
            $recorrido->delete();
            return response()->json([
                "status" => 1,
                "msg" => "Recorrido eliminado exitosamente!",
                "data" => $recorrido,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo en la eliminación, recorrido con id=" . $id . " no existe en la base de datos!",
            ], 404);
        }
    }
}
