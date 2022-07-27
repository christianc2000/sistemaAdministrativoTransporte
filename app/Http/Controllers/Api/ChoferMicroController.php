<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chofer;
use App\Models\ChoferMicro;
use App\Models\Micro;
use App\Models\Micros;
use App\Models\PermisoLinea;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
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
public function lineasUsers(){
    $choferM=ChoferMicro::all()->where('fecha_baja',null);
    $ch = new Collection();
    foreach ($choferM as $cm ) {
        $choferMicro=ChoferMicro::all()->find($cm->id);
        $choferMicro->chofer->user;
        $choferMicro->micro->permisoLinea->linea;
        $ch->push($choferMicro);
    }
    return $ch;
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
        $chofer = Chofer::all()->find($user->chofer->id);
        $chofer->activo=true;
        $chofer->save();

        $choferMicro = new ChoferMicro();
        $choferMicro->fecha_asig = $request->fecha_asig;
        $choferMicro->fecha_baja = $request->fecha_baja;
        $choferMicro->chofer_id = $chofer->id;
        $choferMicro->micro_id = $request->micro_id;
        $choferMicro->save();

        $micro=Micro::all()->find($request->micro_id);
        $permiso=PermisoLinea::all()->find($micro->permiso_linea_id);
        $permiso->activo=true;
        $permiso->save();

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
        $chofer = Chofer::all()->find($user->chofer->id);

        if (isset($choferMicro)) {
            if (isset($request->fecha_baja)) {
                $permiso = PermisoLinea::all()->find($choferMicro->micro->permisoLinea->id);
                $permiso->activo = false; //colocar en inactivo el permiso cuando un chofer no lo ocupa;
                $permiso->save();
                $chofer->activo=false;
                $chofer->save();
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
