<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Requisitos;
use Illuminate\Http\Request;

class RequisitoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requisitos = Requisitos::all();
        return response()->json([
            'status' => 1,
            'msg' => "Lista de Requisitos registrados",
            'data' => $requisitos
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
            'nombre' => 'required|string',
            'id_linea' => 'required|integer'
        ]);
        $requisito = Requisitos::create($request->all());
        return response()->json([
            "status" => 1,
            "msg" => "Requisito registrado exitosamente!",
            "data" => $requisito,
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
        $requisito = Requisitos::all()->find($id);

        if (isset($requisito)) {
            return response()->json([
                "status" => 1,
                "msg" => "Requisito encontrado exitosamente!",
                "data" => $requisito,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo, requisito con id=" . $id . " no existe en la base de datos!",
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
            'nombre' => 'required|string',
            'id_linea' => 'required|integer'
        ]);
        $requisito = Requisitos::all()->find($id);
        if (isset($requisito)) {
            $requisito->update($request->all());
            return response()->json([
                "status" => 1,
                "msg" => "Requisito actualizado exitosamente!",
                "data" => $requisito,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo en la actualización, requisito con id=" . $id . " no existe en la base de datos!",
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
        $requisito = Requisitos::all()->find($id);
        if (isset($requisito)) {
            $requisito->delete();
            return response()->json([
                "status" => 1,
                "msg" => "Requisito eliminado exitosamente!",
                "data" => $requisito,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo en la eliminación, requisito con id=" . $id . " no existe en la base de datos!",
            ], 404);
        }
    }
}
