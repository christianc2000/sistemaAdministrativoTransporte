<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ChoferTarjetaRecorrido;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChoferTarjetaRecorridoController extends Controller
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
            $ct = $user->chofer->choferTarjetas;
            $ctr = new Collection();
            foreach ($ct as $cti) {
                $ctr->push($cti->choferTarjetaRecorridos);
            }

            return response()->json([
                'status' => 1,
                'msg' => 'Chofer Tarjetas del chofer',
                'data' => $ctr
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'msg' => 'Todos los Chofer Tarjetas en la base de datos',
                'data' => ChoferTarjetaRecorrido::all()
            ]);
        }
    }
    public function choferTarjetaActivo()
    {
        $chofer=Auth::user()->chofer;
        if(isset($chofer)){
            $chofer_tarjeta=$chofer->choferTarjetas->where('activo',true)->first();
            return response()->json([
                'status'=>1,
                'msg'=>'Chofer-tarjeta activo encontrado',
                'data'=>$chofer_tarjeta
            ]);
        }else{
            return response()->json([
               'status'=>0,
               'msg'=>'Debe ser un chofer para poder ver su chofer-tarjeta activo' 
            ]);
        }
    }
    public function tiempoRecorridosTarjetaActivo()
    {
        $chofer=Auth::user()->chofer;
        if(isset($chofer)){
            $chofer_tarjeta=$chofer->choferTarjetas->where('activo',true)->first();
            $recorridos=$chofer_tarjeta->choferTarjetaRecorridos;
            
            return response()->json([
                'status'=>1,
                'msg'=>'recorridos chofer-tarjeta activo encontrado',
                'data'=>$recorridos
            ]);
        }else{
            return response()->json([
               'status'=>0,
               'msg'=>'Debe ser un chofer para poder ver su chofer-tarjeta activo' 
            ]);
        }
    }
    public function recorridosTarjetaActivo()
    {
        $chofer=Auth::user()->chofer;
        if(isset($chofer)){
            $chofer_tarjeta=$chofer->choferTarjetas->where('activo',true)->first();
            $recorridos=$chofer_tarjeta->tarjeta->recorridoTarjetas;
            
            return response()->json([
                'status'=>1,
                'msg'=>'recorridos chofer-tarjeta activo encontrado',
                'data'=>$recorridos
            ]);
        }else{
            return response()->json([
               'status'=>0,
               'msg'=>'Debe ser un chofer para poder ver su chofer-tarjeta activo' 
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
            'hora_finalizado' => 'required',
            'recorrido_tarjeta_id' => 'required|integer'
        ]);
        $chofer = Auth::user()->chofer;
        if (isset($chofer)) {
            $chofer_tarjeta = $chofer->choferTarjetas->where('activo', true)->first();
            //return $request->recorrido_tarjeta_id;
            if (isset($chofer_tarjeta)) {

                $recorridos = collect($chofer_tarjeta->tarjeta->recorridoTarjetas);
                $recorrido = $recorridos->where('id', $request->recorrido_tarjeta_id)->first();
                if (isset($recorrido)) {
                    $ctp = new ChoferTarjetaRecorrido();
                    $ctp->hora_finalizado = $request->hora_finalizado;
                    $ctp->chofer_tarjeta_id = $chofer_tarjeta->id;
                    $ctp->recorrido_tarjeta_id = $request->recorrido_tarjeta_id;
                    $ctp->save();
                    return response()->json([
                        'status' => 1,
                        'msg' => 'Se creo correctamente el chofer-tarjeta-recorrido',
                        'data' => $ctp
                    ]);
                } else {
                    return response()->json([
                        'status' => 0,
                        'msg' => 'Error, debe tener un recorrido que pertenezca a la misma chofer-tarjeta activo'
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 0,
                    'msg' => 'Error, debe tener un chofer-tarjeta activo'
                ]);
            }
        } else {
            return response()->json([
                'status' => 0,
                'msg' => 'Error, debe ser un chofer para crear chofer-tarjeta-recorrido'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ctr = ChoferTarjetaRecorrido::all()->find($id);
        if (isset($ctr)) {
            return response()->json([
                'status' => 1,
                'msg' => 'chofer-transporte-recorrido encontrado exitosamente',
                'data' => $ctr
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'msg' => 'Error, chofer-tarjeta-recorrido no existe en la base de dato'
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
        $ctr = ChoferTarjetaRecorrido::all()->find($id);
        if (isset($ctr)) {
            $request->validate([
                'hora_finalizado' => 'required',
                'recorrido_tarjeta_id' => 'required|integer'
            ]);
            $ctr->hora_finalizado = $request->hora_finalizado;
            $ctr->recorrido_tarjeta_id = $request->recorrido_tarjeta_id;
            $ctr->save();
            return response()->json([
                'status' => 1,
                'msg' => 'Se actualizó correctamente el chofer-tarjeta-recorrido',
                'data' => $ctr
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'msg' => 'Error, chofer-tarjeta-recorrido no existe en la base de dato'
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

        $ctr = ChoferTarjetaRecorrido::all()->find($id);
        if (isset($ctr)) {
            $ctr->delete();
            return response()->json([
                'status' => 1,
                'msg' => 'Se eliminó exitosamente el chofer-transporte-recorrido',
                'data' => $ctr
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'msg' => 'Error, chofer-tarjeta-recorrido no existe en la base de dato'
            ]);
        }
    }
}
