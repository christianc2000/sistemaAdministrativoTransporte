<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarjeta;
use App\Models\Chofer;
use App\Models\Micros;
use App\Models\ChoferTarjeta;
use App\Models\Micro;
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
        $chofertarjetas = ChoferTarjeta::join('chofers','chofer_tarjetas.chofer_id','=','chofers.id')
                                ->join('users','chofers.user_id','=','users.id')
                                ->join('chofer_micros','chofers.id','=','chofer_micros.chofer_id')
                                ->join('micros','chofer_micros.micro_id','=','micros.id')
                                ->join('permiso_lineas','micros.permiso_linea_id','=','permiso_lineas.id')
                                ->join('lineas','permiso_lineas.linea_id','=','lineas.id')
                                ->select('chofer_tarjetas.id','chofer_tarjetas.fecha','chofer_tarjetas.chofer_id','chofer_tarjetas.activo','chofer_tarjetas.tarjeta_id','users.nombre','users.apellido','micros.nro_interno','lineas.nrolinea')
                                ->groupBy('chofer_tarjetas.id','chofer_tarjetas.fecha','chofer_tarjetas.chofer_id','chofer_tarjetas.activo','chofer_tarjetas.tarjeta_id','users.nombre','users.apellido','micros.nro_interno','lineas.nrolinea')
                                ->orderBy('chofer_tarjetas.id','asc')
                                ->get();
    //    $chofertarjetas = ChoferTarjeta::all();
        return view('ChoferTarjeta.index')->with('chofertarjetas', $chofertarjetas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tarjetas = DB::table('tarjetas')->select('id')->groupBy('id')->orderBy('id','desc')->get();
        $choferes = Chofer::join('users','chofers.user_id','=','users.id')
                            ->join('chofer_micros', 'chofers.id','=','chofer_micros.chofer_id')
                            ->join('micros','chofer_micros.micro_id','=','micros.id')
                            ->join('permiso_lineas','micros.permiso_linea_id','=','permiso_lineas.id')
                            ->join('lineas','permiso_lineas.linea_id','=','lineas.id')
                            ->select('chofers.id','users.nombre','users.apellido','micros.nro_interno','lineas.nrolinea')
                            ->get();
        return view('ChoferTarjeta.create')->with(['tarjetas'=> $tarjetas, 'choferes'=> $choferes]);
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
        $chofertarjeta->activo = $request->get('estado');
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
        $tarjetas = Tarjeta::all();
        $choferes = Chofer::join('users','chofers.user_id','=','users.id')
                            ->join('chofer_micros', 'chofers.id','=','chofer_micros.chofer_id')
                            ->join('micros','chofer_micros.micro_id','=','micros.id')
                            ->join('permiso_lineas','micros.permiso_linea_id','=','permiso_lineas.id')
                            ->join('lineas','permiso_lineas.linea_id','=','lineas.id')
                            ->select('chofers.id','users.nombre','users.apellido','micros.nro_interno','lineas.nrolinea')
                            ->get();
        $chofertarjeta = ChoferTarjeta::find($id);
        $nombres = Chofer::join('users','chofers.user_id','=','users.id')
                            ->join('chofer_micros', 'chofers.id','=','chofer_micros.chofer_id')
                            ->join('micros','chofer_micros.micro_id','=','micros.id')
                            ->join('permiso_lineas','micros.permiso_linea_id','=','permiso_lineas.id')
                            ->join('lineas','permiso_lineas.linea_id','=','lineas.id')
                            ->select('chofers.id','users.nombre','users.apellido','micros.nro_interno','lineas.nrolinea')
                            ->where('chofers.id', $chofertarjeta->chofer_id)
                            ->get();

        return view('ChoferTarjeta.edit')->with(['chofertarjeta'=> $chofertarjeta, 'tarjetas'=> $tarjetas, 'choferes'=> $choferes, 'nombres'=>$nombres]);
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
        $chofertarjeta->activo = $request->get('estado');
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
