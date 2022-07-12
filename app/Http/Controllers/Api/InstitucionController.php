<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Institucion;
use App\Models\User;
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
        $user = User::all()->find(auth()->user()->id);
        $admin = $user->administrador;

        return response()->json([
            'status' => 1,
            'msg' => "Lista de Instituciones registrados",
            'data' => $admin->institucions

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
        ]);
        $user = User::all()->find(auth()->user()->id);
        $admin = $user->administrador;

        $institucion = new Institucion();
        $institucion->nombre = $request->nombre;
        $institucion->direccion = $request->direccion;
        $institucion->telefono = $request->telefono;
        $institucion->administrador_id = $admin->id;
        $institucion->save();
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
                "msg" => "Fallo, institución con id=" . $id . " no existe en la base de datos!",
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
        ]);

        $institucion = Institucion::all()->find($id);
        if (isset($institucion)) {
            $institucion->nombre = $request->nombre;
            $institucion->direccion = $request->direccion;
            $institucion->telefono = $request->telefono;
            $institucion->save();
            return response()->json([
                "status" => 1,
                "msg" => "Institución actualizada exitosamente!",
                "data" => $institucion,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo en la actualización, institución con id=" . $id . " no existe en la base de datos!",
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
                "msg" => "Fallo en la actualización, institución con id=" . $id . " no existe en la base de datos!",
            ], 404);
        }
    }
}
