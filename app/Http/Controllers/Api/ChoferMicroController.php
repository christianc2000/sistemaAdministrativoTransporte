<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ChoferMicro;
use App\Models\PermisoLinea;
use App\Models\User;
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
        $user = auth()->user();
        $user = User::all()->find($user->id);
        $chofer = $user->chofer;
        return response()->json([
            "status" => 1,
            "msg" => "Lista de choferes y sus micros",
            "data" => $chofer->choferMicros
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
            'micro_id' => 'required|numeric',
        ]);
        $user = auth()->user();
        $user = User::all()->find($user->id);
        $chofer = $user->chofer;

        $choferMicro = new ChoferMicro();
        $choferMicro->fecha_asig = $request->fecha_asig;
        $choferMicro->fecha_baja = $request->fecha_baja;
        $choferMicro->chofer_id = $chofer->id;
        $choferMicro->micro_id = $request->micro_id;
        $choferMicro->save();

        return response()->json([
            "status" => 1,
            "msg" => "Chofer-micro registrado exitosamente",
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
        $choferMicro = ChoferMicro::all()->find($id);
        if (isset($choferMicro)) {
            return response()->json([
                "status" => 1,
                "msg" => "Chofer-micro encontrado exitosamente",
                "data" => $choferMicro
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo, chofer-micro con id=" . $id . " no existe en la base de datos!",
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
            'fecha_asig' => 'nullable|date',
            'fecha_baja' => 'date|nullable',
            'micro_id' => 'nullable|numeric',
        ]);
        $choferMicro = ChoferMicro::all()->find($id);

        $user = auth()->user();
        $user = User::all()->find($user->id);
        $chofer = $user->chofer;

        if (isset($choferMicro)) {
            if (empty($choferMicro->fecha_baja) && isset($request->fecha_baja)) {
                $permiso = PermisoLinea::all()->find($choferMicro->micro->permisoLinea->id);
                $permiso->activo = false; //colocar en inactivo el permiso cuando un chofer no lo ocupa;
                $permiso->save();
            }
            $choferMicro->fecha_asig = $request->fecha_asig;
            $choferMicro->fecha_baja = $request->fecha_baja;
            $choferMicro->chofer_id = $chofer->id;
            $choferMicro->micro_id = $request->micro_id;
            $choferMicro->save();

            return response()->json([
                "status" => 1,
                "msg" => "Chofer-micro actualizado exitosamente",
                "data" => $choferMicro,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo en la actualización, chofer-micro con id=" . $id . " no existe en la base de datos!",
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
        $choferMicro = ChoferMicro::all()->find($id);
        if (isset($choferMicro)) {
            $choferMicro->delete();
            return response()->json([
                "status" => 1,
                "msg" => "chofer-micro eliminado exitosamente!",
                "data" => $choferMicro,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo en la eliminación, chofer-micro con id=" . $id . " no existe en la base de datos!",
            ], 404);
        }
    }
}
