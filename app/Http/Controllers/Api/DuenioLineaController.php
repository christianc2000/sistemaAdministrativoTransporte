<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Duenio;
use App\Models\DuenioLinea;
use Illuminate\Http\Request;

class DuenioLineaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $duenioLineas = DuenioLinea::all();
        return response()->json([
            "status" => 1,
            "msg" => "Lista de dueño-líneas",
            "data" => $duenioLineas
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
            'aporte'=>'required',
            'fecha'=>'required|date',
            'duenio_id'=>'required|integer',
            'linea_id'=>'required|integer',
        ]);
        $duenioLinea = DuenioLinea::create($request->all());
        return response()->json([
            "status" => 1,
            "msg" => "Duenio-linea registrado exitosamente",
            "data" => $duenioLinea,
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
        $duenioLinea = DuenioLinea::all()->find($id);
        if (isset($duenioLinea)) {
            return response()->json([
                "status" => 1,
                "msg" => "Dueño-línea encontrado exitosamente",
                "data" => $duenioLinea
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo, dueño-línea con id=" . $id . " no existe en la base de datos!",
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
            'aporte'=>'required',
            'fecha'=>'required|date',
            'duenio_id'=>'nullable|integer',
            'linea_id'=>'nullable|integer'
        ]);
        $duenioLinea = DuenioLinea::all()->find($id);

        if (isset($duenioLinea)) {
            $duenioLinea->update($request->all());
            return response()->json([
                "status" => 1,
                "msg" => "Dueño-línea actualizado exitosamente",
                "data" => $duenioLinea,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo en la actualización, dueño-línea con id=" . $id . " no existe en la base de datos!",
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
        $duenioLinea = DuenioLinea::all()->find($id);
        if (isset($duenioLinea)) {
            $duenioLinea->delete();
            return response()->json([
                "status" => 1,
                "msg" => "Dueño-línea eliminado exitosamente!",
                "data" => $duenioLinea,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo en la eliminación, dueño-línea con id=".$id." no existe en la base de datos!",
            ], 404);
        }
    }
}
