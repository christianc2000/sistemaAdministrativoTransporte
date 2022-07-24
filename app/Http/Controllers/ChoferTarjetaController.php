<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarjeta;
use App\Models\Chofer;
use App\Models\Micros;
use App\Models\ChoferTarjeta;
use Illuminate\Support\Facades\DB;

class ChoferTarjetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chofertarjetas = ChoferTarjeta::all();
        return view('ChoferTarjeta.index')->with('chofertarjetas', $chofertarjetas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $micros = Micros::all();
        $tarjetas = DB::table('tarjetas')->select('id')->groupBy('id')->orderBy('id','desc')->get();
        $choferes = Chofer::all();
        return view('ChoferTarjeta.create')->with(['tarjetas'=> $tarjetas, 'choferes'=> $choferes, 'micros'=>$micros]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chofertarjeta = new ChoferTarjeta();
        $chofertarjeta->fecha = $request->get('fecha');
        $chofertarjeta->nro_interno = $request->get('nro_interno');
        $chofertarjeta->chofer_id = $request->get('id_chofer');
        $chofertarjeta->tarjeta_id = $request->get('id_tarjeta');

        $chofertarjeta->save();

        return redirect('/chofertarjetas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RecorridoTarjeta  $recorridoTarjeta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RecorridoTarjeta  $recorridoTarjeta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $micros = Micros::all();
        $tarjetas = Tarjeta::all();
        $choferes = Chofer::all();
        $chofertarjeta = ChoferTarjeta::find($id);
        return view('ChoferTarjeta.edit')->with(['chofertarjeta'=> $chofertarjeta, 'tarjetas'=> $tarjetas, 'choferes'=> $choferes, 'micros'=>$micros]);
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
        $chofertarjeta = ChoferTarjeta::find($id);
        $chofertarjeta->fecha = $request->get('fecha');
        $chofertarjeta->nro_interno = $request->get('nro_interno');
        $chofertarjeta->chofer_id = $request->get('id_chofer');
        $chofertarjeta->tarjeta_id = $request->get('id_tarjeta');

        $chofertarjeta->save();

        return redirect('/chofertarjetas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RecorridoTarjeta  $recorridoTarjeta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chofertarjeta = ChoferTarjeta::find($id);
        $chofertarjeta->delete();

        return redirect('/chofertarjetas');
    }
}
