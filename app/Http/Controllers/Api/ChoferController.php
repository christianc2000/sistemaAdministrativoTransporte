<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chofer;
use App\Models\User;
use Illuminate\Http\Request;

class ChoferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chofers = Chofer::all();
        return response()->json([
            'status' => 1,
            'msg' => "Lista de Choferes registrados",
            'data' => $chofers

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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $chofer=Chofer::all()->find($id);
        if (isset($user)) {
            return response()->json([
                "status" => 1,
                "msg" => "Chofer encontrado exitosamente!",
                "data" => $chofer . $chofer->user,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo, chofer con id=" . $id . " no existe en la base de datos!",
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
            'direccion' => 'required|string',
            'activo' => 'required|boolean',
            'user_id' => 'required'
        ]);
        $chofer=Chofer::all()->find($id);
        if (isset($user)) {
            $chofer->update($request->all());
            return response()->json([
                "status" => 1,
                "msg" => "Chofer actualizado exitosamente!",
                "data" => $chofer,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo en la actualización, chofer con id=" . $id . " no existe en la base de datos!",
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
        /*$chofer = Chofer::all()->find($id);
        if (isset($chofer)) {
            $chofer->delete();
            return response()->json([
                "status" => 1,
                "msg" => "Chofer eliminado exitosamente!",
                "data" => $chofer,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo en la eliminación, chofer con id=" . $id . " no existe en la base de datos!",
            ], 404);
        }*/
    }
}
