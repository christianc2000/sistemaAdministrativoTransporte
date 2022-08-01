<?php

namespace App\Http\Controllers;

use App\Models\Chofer;
use App\Models\ChoferTarjeta;
use App\Models\RecorridoTarjeta;
use App\Models\Tarjeta;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RecorridoTarjetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recorridos = RecorridoTarjeta::all();
        return view('Recorrido.index')->with('recorridos', $recorridos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tarjetas = Tarjeta::all();
        return view('Recorrido.create')->with('tarjetas', $tarjetas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recorrido = new RecorridoTarjeta();
        $recorrido->nro_recorrido = $request->get('nro');
        $recorrido->hora_partida = $request->get('partida');
        $recorrido->hora_llegada = $request->get('llegada');

        $recorrido->tarjeta_id = $request->get('id_tarjeta');

        $recorrido->save();

        return redirect()->route('recorridos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RecorridoTarjeta  $recorridoTarjeta
     * @return \Illuminate\Http\Response
     */
    public function show($tarjeta_id)
    {

        $recorridos = DB::table('recorrido_tarjetas')->select('id', 'nro_recorrido', 'hora_partida', 'hora_llegada')->where('tarjeta_id', $tarjeta_id)->get();


        $choferes = DB::table('chofer_tarjetas')->select('chofer_tarjetas.*')->where('tarjeta_id', $tarjeta_id)->get();
        $chofers = new Collection();
        foreach ($choferes as $chofere) {
            $chofertarjeta=ChoferTarjeta::all()->find($chofere->id);
            //return $chofertarjeta->chofer->choferMicros->where('fecha_baja',null)->first();
            $chofers->push($chofertarjeta->chofer->choferMicros->where('fecha_baja',null)->first()->micro);
        }

       // return $chofers;
        return view('Recorrido.show')->with(['recorridos' => $recorridos, 'tarjeta_id' => $tarjeta_id, 'chofers' => $chofers]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RecorridoTarjeta  $recorridoTarjeta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarjetas = Tarjeta::all();
        $recorrido = RecorridoTarjeta::find($id);
        return view('Recorrido.edit')->with(['recorrido' => $recorrido, 'tarjetas' => $tarjetas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RecorridoTarjeta  $recorridoTarjeta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $recorrido = RecorridoTarjeta::find($id);
        $recorrido->nro_recorrido = $request->get('nro');
        $recorrido->hora_partida = $request->get('partida');
        $recorrido->hora_llegada = $request->get('llegada');
        $recorrido->tarjeta_id = $request->get('id_tarjeta');

        $recorrido->save();

        return redirect()->route('recorridos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RecorridoTarjeta  $recorridoTarjeta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recorrido = RecorridoTarjeta::find($id);
        $recorrido->delete();

        return redirect('/recorridos');
    }
}
