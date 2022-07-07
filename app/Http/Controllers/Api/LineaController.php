<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lineas;
use Illuminate\Http\Request;

class LineaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lineas = Lineas::all();
        return response()->json([
            'status' => 1,
            'msg' => "Lista de Líneas registrados",
            'data' => $lineas

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
            'nrolinea'=>'required|integer|unique:lineas',
            'telefono'=>'required|integer',
            'sede'=>'required|string', //lugar de la sede
            'id_institucion'=>'required|integer',
            'id_admin_institucion'=>'required|required',
        ]);
        $linea=Lineas::create($request->all());
        return response()->json([
            "status" => 1,
            "msg" => "Línea registrado exitosamente!",
            "data" => $linea,
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
        $linea = Lineas::all()->find($id);
        if (isset($linea)) {
            return response()->json([
                "status" => 1,
                "msg" => "Línea encontrado exitosamente!",
                "data" => $linea,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo, línea con id=".$id." no existe en la base de datos!",
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
            'nrolinea'=>'required|integer',
            'telefono'=>'required|integer',
            'sede'=>'required|string', //lugar de la sede
            'id_institucion'=>'required|integer',
            'id_admin_institucion'=>'required|integer',
        ]);
        $linea = Lineas::all()->find($id);
        if (isset($linea)) {
            $linea->update($request->all());
            return response()->json([
                "status" => 1,
                "msg" => "Línea actualizada exitosamente!",
                "data" => $linea,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo en la actualización, línea con id=".$id." no existe en la base de datos!",
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
        $linea = Lineas::all()->find($id);
        if (isset($linea)) {
            return response()->json([
                "status" => 1,
                "msg" => "Línea eliminado exitosamente!",
                "data" => $linea,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo en la eliminación, línea con id=".$id." no existe en la base de datos!",
            ], 404);
        }
    }
}
