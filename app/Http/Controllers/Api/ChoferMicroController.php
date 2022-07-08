<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ChoferMicro;
use App\Models\PermisoLinea;
use Illuminate\Http\Request;

class ChoferMicroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $choferM = ChoferMicro::all();
        return response()->json([
            "status" => 1,
            "msg" => "Lista de choferes y sus micros",
            "data" => $choferM
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
            'fecha_asig' => 'required|date',
            'fecha_baja' => 'date|nullable',
            'id_chofer' => 'required|numeric',
            'id_micro' => 'required|numeric',
        ]);
        $choferMicro = ChoferMicro::create($request->all());
        return response()->json([
            "status" => 1,
            "msg" => "Micro registrado exitosamente al chofer",
            "data" => $choferMicro,
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
        $choferMicro=ChoferMicro::all()->find($id);
        if(isset($choferMicro)){
            return response()->json([
             "status"=>1,
             "msg"=>"chofer del micro encontrado exitosamente",
             "data"=>$choferMicro
            ]);
        }else{
            return response()->json([
                "status" => 0,
                "msg" => "Fallo, chofer y su micro con id=" . $id . " no existe en la base de datos!",
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
            'fecha_asig' => 'required|date',
            'fecha_baja' => 'date|nullable',
            'id_chofer' => 'required|numeric',
            'id_micro' => 'required|numeric',
        ]);
        $choferMicro = ChoferMicro::all()->find($id);
        if (isset($choferMicro)) {
            $choferMicro->update($request->all());
            if ($choferMicro->fecha_baja!=null) {
                $micro = $choferMicro->micro;
                $permiso = PermisoLinea::all()->find($micro->permisoLinea->id);
                return $permiso;
                $permiso->activo = 0;
                $permiso->save();
                $chofer=$choferMicro->chofer;
                $chofer->activo=0;
                $chofer->save();
            }
            return response()->json([
                "status" => 1,
                "msg" => "Micro del chofer actualizado exitosamente",
                "data" => $choferMicro->micro->permisoLinea,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo en la actualización, micro de chofer con id=" . $id . " no existe en la base de datos!",
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
        //
    }
}
