<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Duenio;
use Illuminate\Http\Request;

class DueniosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $duenios = Duenio::all();
        return response()->json([
            'status' => 1,
            'msg' => "Lista de duenios registrados",
            'data' => $duenios
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
            'ci' => 'required|string|unique:duenios',
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'sexo' => 'required|string|max:1',
            'fecha_nac' => 'required|date',
            'email' => 'required|email|unique:duenios',
            'telefono' => 'required|integer',
        ]);
        $duenio = Duenio::create($request->all());
        return response()->json([
            "status" => 1,
            "msg" => "Duenio registrado exitosamente!",
            "data" => $duenio,
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
        $duenio = Duenio::all()->find($id);
        // $chofer = Chofer::FindOrFail($id);
        //return $chofer;
        if (isset($duenio)) {
            return response()->json([
                "status" => 1,
                "msg" => "Dueño encontrado exitosamente!",
                "data" => $duenio,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo, dueño con id=" . $id . " no existe en la base de datos!",
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
            'ci' => 'nullable|string',
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'sexo' => 'required|string|max:1',
            'fecha_nac' => 'required|date',
            'email' => 'nullable|email|unique:duenios',
            'telefono' => 'required|integer',
        ]);
        $duenio = Duenio::all()->find($id);
        if (isset($duenio)) {
            $duenio->update($request->all);
            return response()->json([
                "status" => 1,
                "msg" => "Duenio actualizado exitosamente!",
                "data" => $duenio,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo en la actualización, duenio con id=" . $id . " no existe en la base de datos!",
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
        $duenio = Duenio::all()->find($id);
        if (isset($duenio)) {
            $duenio->delete();
            return response()->json([
                "status" => 1,
                "msg" => "Duenio eliminado exitosamente!",
                "data" => $duenio,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo en la eliminación, duenio con id=" . $id . " no existe en la base de datos!",
            ], 404);
        }
    }
}
