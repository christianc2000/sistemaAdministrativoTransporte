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
        $requisitos = Requisitos::all();
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
        return view('Requisito.edit')->with('requisito', $requisito);
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
