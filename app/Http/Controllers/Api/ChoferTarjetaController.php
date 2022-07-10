<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ChoferTarjeta;
use App\Models\User;
use Illuminate\Http\Request;

class ChoferTarjetaController extends Controller
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
        $chofer = $user->chofer;
        return response()->json([
            "status" => 1,
            "msg" => "Lista de chofer-tarjeta",
            "data" => $chofer->choferTarjetas
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
            'fecha' => 'required|date',
            'nro_interno' => 'required|integer',
            'id_chofer' => 'required|integer',
            'id_tarjeta' => 'required|integer'
        ]);
        $choferTarjeta = ChoferTarjeta::create($request->all());
        return response()->json([
            "status" => 1,
            "msg" => "Chofer-tarjeta registrado exitosamente",
            "data" => $choferTarjeta,
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
        $choferTarjeta = ChoferTarjeta::all()->find($id);
        if (isset($choferTarjeta)) {
            return response()->json([
                "status" => 1,
                "msg" => "Chofer-tarjeta encontrado exitosamente",
                "data" => $choferTarjeta
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo, chofer-tarjeta con id=" . $id . " no existe en la base de datos!",
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
            'fecha' => 'required|date',
            'nro_interno' => 'required|integer',
            'id_chofer' => 'nullable|integer',
            'id_tarjeta' => 'nullable|integer'
        ]);
        $choferTarjeta = ChoferTarjeta::all()->find($id);

        if (isset($choferTarjeta)) {
            $choferTarjeta->update($request->all());
            return response()->json([
                "status" => 1,
                "msg" => "Chofer-tarjeta actualizado exitosamente",
                "data" => $choferTarjeta,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo en la actualización, chofer-tarjeta con id=" . $id . " no existe en la base de datos!",
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
        $choferTarjeta = ChoferTarjeta::all()->find($id);
        if (isset($choferTarjeta)) {
            $choferTarjeta->delete();
            return response()->json([
                "status" => 1,
                "msg" => "Chofer-tarjeta eliminado exitosamente!",
                "data" => $choferTarjeta,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo en la eliminación, chofer-tarjeta con id=".$id." no existe en la base de datos!",
            ], 404);
        }
    }
}
