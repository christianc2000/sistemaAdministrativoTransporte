<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chofer;
use App\Models\ChoferRequisitos;
use Illuminate\Http\Request;

class ChoferRequisitoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $choferRequisitos=ChoferRequisitos::all();
        return response()->json([
            "status" => 1,
            "msg" => "Lista de chofer-requisitos",
            "data" => $choferRequisitos
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
            'presenta'=>'required|boolean',
            'id_chofer'=>'required|integer',
            'id_requisito'=>'required|integer',
        ]);
        $choferRequisito=ChoferRequisitos::create($request->all());
        return response()->json([
            "status" => 1,
            "msg" => "Chofer-requisito registrado exitosamente",
            "data" => $choferRequisito,
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
        $choferRequisito = ChoferRequisitos::all()->find($id);
        if (isset($choferRequisito)) {
            return response()->json([
                "status" => 1,
                "msg" => "Chofer-requisito encontrado exitosamente",
                "data" => $choferRequisito
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo, chofer-requisito con id=" . $id . " no existe en la base de datos!",
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
            'presenta'=>'required|boolean',
            'id_chofer'=>'nullable|integer',
            'id_requisito'=>'nullable|integer',
        ]);
        $choferRequisito = ChoferRequisitos::all()->find($id);

        if (isset($choferRequisito)) {
            $choferRequisito->update($request->all());
            return response()->json([
                "status" => 1,
                "msg" => "Chofer-requisito actualizado exitosamente",
                "data" => $choferRequisito,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo en la actualización, chofer-requisito con id=" . $id . " no existe en la base de datos!",
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
        $choferRequisito = ChoferRequisitos::all()->find($id);
        if (isset($choferRequisito)) {
            $choferRequisito->delete();
            return response()->json([
                "status" => 1,
                "msg" => "chofer-requisito eliminado exitosamente!",
                "data" => $choferRequisito,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo en la eliminación, chofer-requisito con id=".$id." no existe en la base de datos!",
            ], 404);
        }
    }
}
