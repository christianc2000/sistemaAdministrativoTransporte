<?php

namespace App\Http\Controllers;

use App\Models\Tarjeta;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TarjetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarjetas = Tarjeta::all();
        return view('Tarjeta.index')->with('tarjetas', $tarjetas);
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
        $tarjeta = new Tarjeta();

        $tarjeta->save();

        return redirect('/admin/tarjetas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarjeta  $tarjeta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarjetas = DB::table('recorrido_tarjetas')->select('id','nro_recorrido','hora_partida','hora_llegada')->where('tarjeta_id', $id)->get();
        
        return view('Tarjeta.show')->with(['tarjetas' => $tarjetas, 'id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarjeta  $tarjeta
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarjeta $tarjeta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarjeta  $tarjeta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarjeta $tarjeta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarjeta  $tarjeta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarjeta = Tarjeta::find($id);
       
        $tarjeta->delete();
        
        return redirect()->route('tarjetas.index');
    }
}
