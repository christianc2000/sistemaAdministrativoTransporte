<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tarjeta;
use Illuminate\Http\Request;

class TarjetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarjetas = Tarjeta::all();
        return response()->json([
            'status' => 1,
            'msg' => "Lista de Tarjetas registrados",
            'data' => $tarjetas
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
            
        ]);
        $tarjeta = Tarjeta::create($request->all());
        return response()->json([
            "status" => 1,
            "msg" => "Tarjeta registrado exitosamente!",
            "data" => $tarjeta,
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
        $tarjeta = Tarjeta::all()->find($id);

        if (isset($tarjeta)) {
            return response()->json([
                "status" => 1,
                "msg" => "Tarjeta encontrado exitosamente!",
                "data" => $tarjeta,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo, tarjeta con id=" . $id . " no existe en la base de datos!",
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
        $tarjeta = Tarjeta::all()->find($id);
        if (isset($tarjeta)) {
            $tarjeta->delete();
            return response()->json([
                "status" => 1,
                "msg" => "Tarjeta eliminado exitosamente!",
                "data" => $tarjeta,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo en la eliminación, tarjeta con id=" . $id . " no existe en la base de datos!",
            ], 404);
        }
    }
}
