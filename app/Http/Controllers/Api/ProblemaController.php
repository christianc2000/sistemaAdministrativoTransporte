<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chofer;
use App\Models\ChoferMicro;
use App\Models\Problema;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProblemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->tipo == "C") {
            $chofer = $user->chofer;
            $chofermicro = $chofer->choferMicros;

            $problemas = new Collection();
            foreach ($chofermicro as $cm) {
                $cm = ChoferMicro::all()->find($cm->id);
                foreach ($cm->problemas as $p) {
                    $p = Problema::all()->find($p->id);
                    $p->choferMicro;
                    $problemas->push($p);
                }
            }
            //$chofermicro = ChoferMicro::all()->find($id);

            // $problemas = Problema::where('chofer_micro_id', $chofermicro->id)->get();
            return response()->json([
                "status" => 1,
                "msg" => "Problemas encontrado exitosamente!",
                "data" => $problemas,
            ]);
        }
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
            'descripcion' => 'required|string',
            'chofer_micro_id' => 'required|integer'
        ]);
        $problema = Problema::create($request->all());
        return response()->json([
            "status" => 1,
            "msg" => "Problema registrado exitosamente!",
            "data" => $problema
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function problemasMicroActivo()
    {
        $user = Auth::user();
        if ($user->tipo == 'C') {
            $chofer = Chofer::all()->find($user->chofer->id);
            $choferMicros = ChoferMicro::where('chofer_id', $chofer->id)->get();
            $problemas = [];
            foreach ($choferMicros as $choferMicro) {
                if ($choferMicro->fecha_baja == null) {
                    $problemas = $choferMicro->problemas;
                }
            }
            return response()->json([
                'status' => 1,
                'msg' => 'Problemas del micro activo encontrados',
                'data' => $problemas
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'msg' => 'Usuario no chofer',
            ]);
        }
    }
    public function show($id)
    {
        $problema = Problema::all()->find($id);
        if (isset($problema)) {
            return response()->json([
                "status" => 1,
                "msg" => "Problema encontrado exitosamente!",
                "data" => $problema,
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'msg' => "Fallo, problema con id=" . $id . " no existe en la base de datos!"
            ]);
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
        
        $problema = Problema::all()->find($id);
        if (isset($problema)) {
            $request->validate([
                'descripcion' => 'required|string',
                'chofer_micro_id' => 'required|integer'
            ]);
            $problema->update($request->all());
            return response()->json([
                "status" => 1,
                "msg" => "Problema actualizado exitosamente!",
                "data" => $problema
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'msg' => "Fallo, problema con id=" . $id . " no existe en la base de datos!"
            ]);
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
        $problema = Problema::all()->find($id);
        if (isset($problema)) {
            $problema->delete();
            return response()->json([
                "status" => 1,
                "msg" => "Problema eliminado exitosamente!",
                "data" => $problema,
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Fallo en la eliminación, problema con id=" . $id . " no existe en la base de datos!",
            ], 404);
        }
    }
}
