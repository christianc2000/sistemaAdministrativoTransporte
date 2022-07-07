<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PermisoLinea;
use Illuminate\Http\Request;

class PermisoLineaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permisos = PermisoLinea::all();
        return response()->json([
            'status' => 1,
            'msg' => "Lista de Permisos registrados",
            'data' => $permisos
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
            'activo' => 'required|boolean',
            'id_linea' => 'required|integer',
            'id_duenio' => 'required|integer'
        ]);
        $permiso = PermisoLinea::create($request->all());
        return response()->json([
            "status" => 1,
            "msg" => "Permiso registrado exitosamente!",
            "data" => $permiso,
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
        $permiso = PermisoLinea::all()->find($id);
        // $chofer = Chofer::FindOrFail($id);
        //return $chofer;
        if (isset($permiso)) {
            return response()->json([
                "status" => 1,
                "msg" => "Permiso encontrado exitosamente!",
                "data" => $permiso,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo, permiso con id=" . $id . " no existe en la base de datos!",
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
            'activo' => 'required|boolean',
            'id_linea' => 'required|integer',
            'id_duenio' => 'required|integer'
        ]);
        $permiso = PermisoLinea::all()->find($id);
        if (isset($permiso)) {
            $permiso->update($request->all());
            return response()->json([
                "status" => 1,
                "msg" => "Permiso actualizado exitosamente!",
                "data" => $permiso,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo en la actualización, permiso con id=" . $id . " no existe en la base de datos!",
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
        $permiso = PermisoLinea::all()->find($id);
        if (isset($permiso)) {
            $permiso->delete();
            return response()->json([
                "status" => 1,
                "msg" => "Permiso eliminado exitosamente!",
                "data" => $permiso,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo en la eliminación, permiso con id=" . $id . " no existe en la base de datos!",
            ], 404);
        }
    }
}
