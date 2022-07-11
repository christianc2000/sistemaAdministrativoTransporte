<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chofer;
use App\Models\Micros;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Array_;

class ChoferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $chofer = Chofer::all()->find($user->chofer->id);
        return response()->json([
            'status' => 1,
            'msg' => "datos chofer",
            'data' => $chofer

        ]);
    }
    public function choferMicros()
    {
        $user = auth()->user();

        $chofer = Chofer::all()->find($user->chofer->id);
        $cm = $chofer->choferMicros;
        $micros = Micros::join("chofer_micros", "chofer_micros.micro_id", "=", "micros.id")
            ->where('chofer_micros.chofer_id', '=', $chofer->id)
            ->select("micros.nro_interno","micros.placa","micros.modelo","micros.cant_asiento","micros.fecha_asignacion","chofer_micros.fecha_asig","chofer_micros.fecha_baja")
            ->get();
        return $micros;
   
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

        $chofer = Chofer::all()->find($id);
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
            'direccion' => 'nullable|string',
            'activo' => 'required|boolean',
            'user_id' => 'nullable'
        ]);
        $chofer = Chofer::all()->find($id);
        if (isset($chofer)) {
            $chofer->update($request->all());
            $chofer = Chofer::all()->find($chofer->id);
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
