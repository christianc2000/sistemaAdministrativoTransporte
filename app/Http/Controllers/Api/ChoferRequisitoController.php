<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chofer;
use App\Models\ChoferRequisitos;
use App\Models\User;
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
        $user = auth()->user();
        $user = User::all()->find($user->id);

        $chofer = Chofer::all()->find($user->chofer->id);
        
        //if (isset($chofer)) {
        return response()->json([
            "status" => 1,
            "msg" => "Lista de chofer-requisitos",
            "data" => $chofer->choferRequisitos
        ]);
        //} 
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
            'presenta' => 'required|boolean',
            'requisito_id' => 'required|integer',
        ]);
        $user = auth()->user();
        $user = User::all()->find($user->id);
        $chofer = $user->chofer;

        $choferRequisito = new ChoferRequisitos();
        $choferRequisito->presenta = $request->presenta;
        $choferRequisito->chofer_id = $chofer->id;
        $choferRequisito->requisito_id = $request->requisito_id;
        $choferRequisito->save();

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
            'presenta' => 'required|boolean',

            'requisito_id' => 'nullable|integer',
        ]);
        $choferRequisito = ChoferRequisitos::all()->find($id);

        $user = auth()->user();
        $user = User::all()->find($user->id);
        $chofer = $user->chofer;

        if (isset($choferRequisito)) {
            $choferRequisito->presenta = $request->presenta;
            $choferRequisito->chofer_id = $chofer->id;
            $choferRequisito->requisito_id = $request->requisito_id;
            $choferRequisito->save();

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
                "msg" => "Fallo en la eliminación, chofer-requisito con id=" . $id . " no existe en la base de datos!",
            ], 404);
        }
    }
}
