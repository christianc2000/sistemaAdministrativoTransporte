<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Institucion;
use Illuminate\Http\Request;

class InstitucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $institucions = Institucion::all();
        return response()->json([
            'status' => 1,
            'msg' => "Lista de Instituciones registrados",
            'data' => $institucions

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
            'nombre' => 'required|string|max:40',
            'direccion' => 'required|string|max:30',
            'telefono' => 'required|numeric',
            'id_administrador' => 'required|integer'
        ]);
        $institucion = Institucion::create($request->all());
        return response()->json([
            "status" => 1,
            "msg" => "Institucion registrada exitosamente!",
            "data" => $institucion,
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
        $institucion = Institucion::all()->find($id);
        if (isset($institucion)) {
            return response()->json([
                "status" => 1,
                "msg" => "Institución encontrado exitosamente!",
                "data" => $institucion,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo, institución con id=".$id." no existe en la base de datos!",
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
            'nombre' => 'required|string|max:40',
            'direccion' => 'required|string|max:30',
            'telefono' => 'required|numeric',
            'id_administrador' => 'required|integer'
        ]);
        $institucion = Institucion::all()->find($id);
        if (isset($institucion)) {
            $institucion->update($request->all());
            return response()->json([
                "status" => 1,
                "msg" => "Institución actualizada exitosamente!",
                "data" => $institucion,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo en la actualización, institución con id=".$id." no existe en la base de datos!",
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
        $institucion = Institucion::all()->find($id);
        if (isset($institucion)) {
            $institucion->delete();
            return response()->json([
                "status" => 1,
                "msg" => "Institución eliminada exitosamente!",
                "data" => $institucion,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo en la actualización, institución con id=".$id." no existe en la base de datos!",
            ], 404);
        }
    }
}
