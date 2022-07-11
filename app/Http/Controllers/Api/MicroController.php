<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Micros;
use Illuminate\Http\Request;

class MicroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $micros = Micros::all();
        return response()->json([
            'status' => 1,
            'msg' => "Lista de Micros registrados",
            'data' => $micros
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
            'nro_interno' => 'required|numeric',
            'placa' => 'required|string',
            'modelo' => 'required|string',
            'cant_asiento' => 'required|numeric',
            //'foto.*'   =>  'image|mimes:jpg,jpeg,bmp,png|max:2048|nullable',
            'fecha_asignacion' => 'nullable|date',
            'fecha_baja' => 'nullable|date',
            'permiso_linea_id' => 'required'
        ]);

        $micro = Micros::create($request->all());
        return response()->json([
            "status" => 1,
            "msg" => "Micro registrado exitosamente!",
            "data" => $micro,
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
        $micro = Micros::all()->find($id);
        // $chofer = Chofer::FindOrFail($id);
        //return $chofer;
       
        $linea=$micro->permisoLinea->linea;
        
        if (isset($micro)) {
            return response()->json([
                "status" => 1,
                "msg" => "Micro encontrado exitosamente!",
                "data" => $micro,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo, micro con id=" . $id . " no existe en la base de datos!",
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
            'nro_interno' => 'required|numeric',
            'placa' => 'required|string',
            'modelo' => 'required|string',
            'cant_asiento' => 'required|numeric',
            //'foto.*'   =>  'image|mimes:jpg,jpeg,bmp,png|max:2048|nullable',
            'fecha_asignacion' => 'nullable|date',
            'fecha_baja' => 'nullable|date',
            'permiso_linea_id' => 'required|integer'
        ]);

        $micro = Micros::all()->find($id);
        if (isset($micro)) {
            $micro->update($request->all());
            return response()->json([
                "status" => 1,
                "msg" => "Micro actualizado exitosamente!",
                "data" => $micro,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo en la actualización, micro con id=" . $id . " no existe en la base de datos!",
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
        $micro = Micros::all()->find($id);
        if (isset($micro)) {
            $micro->delete();
            return response()->json([
                "status" => 1,
                "msg" => "Micro eliminado exitosamente!",
                "data" => $micro,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo en la eliminación, micro con id=" . $id . " no existe en la base de datos!",
            ], 404);
        }
    }
}
