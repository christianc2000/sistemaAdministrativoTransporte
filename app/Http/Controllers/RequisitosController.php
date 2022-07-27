<?php

namespace App\Http\Controllers;

use App\Models\Requisitos;
use App\Models\Lineas;
use Illuminate\Http\Request;

class RequisitosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requisitos = Requisitos::join('lineas', 'requisitos.linea_id','=','lineas.id')
                                    ->select('requisitos.id','requisitos.nombre','lineas.nrolinea')
                                    ->get();
    //    $requisitos = Requisitos::all();
        return view('Requisito.index')->with('requisitos', $requisitos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lineas = Lineas::all();
        return view('Requisito.create')->with('lineas', $lineas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requisitos = new Requisitos();
        $requisitos->nombre = $request->get('nombre');
        $requisitos->linea_id = $request->get('linea_id');

        $requisitos->save();

        return redirect('/requisitos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Requisitos  $requisitos
     * @return \Illuminate\Http\Response
     */
    public function show(Requisitos $requisitos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Requisitos  $requisitos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $requisito = Requisitos::find($id);
        $nrolinea = Requisitos::join('lineas', 'requisitos.id','=','lineas.id')
                                ->select('lineas.id','lineas.nrolinea')
                                ->where('lineas.id',$requisito->linea_id)
                                ->get();
        $lineas = Lineas::all();
        return view('Requisito.edit')->with(['requisito'=> $requisito, 'nrolinea'=>$nrolinea, 'lineas'=>$lineas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Requisitos  $requisitos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requisito = Requisitos::find($id);
        $requisito->nombre = $request->get('nombre');
        $requisito->linea_id = $request->get('linea_id');

        $requisito->save();

        return redirect('/requisitos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Requisitos  $requisitos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requisito = Requisitos::find($id);
        $requisito->delete();

        return redirect('/requisitos');
    }
}
