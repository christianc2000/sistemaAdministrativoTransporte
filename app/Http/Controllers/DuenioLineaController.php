<?php

namespace App\Http\Controllers;

use App\Models\Duenio;
use App\Models\DuenioLinea;
use Illuminate\Http\Request;

class DuenioLineaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
           'aporte'=>'required|numeric',
           'fecha'=>'required|date',
           'descripcion'=>'required|string',
           'linea_id'=>'required'
        ]);
       
        $duenios=Duenio::join('duenio_lineas','duenios.id','=','duenio_lineas.duenio_id')
        ->where('duenio_lineas.linea_id',$request->linea_id)
        ->select('duenios.*')
        ->groupBy('duenios.id')
        ->get();
        foreach ($duenios as $duenio) {
            DuenioLinea::create([
                'aporte'=>$request->aporte,
                'fecha'=>$request->fecha,
                'descripcion_aporte'=>$request->descripcion,
                'linea_id'=>$request->linea_id,
                'duenio_id'=>$duenio->id
            ]);
        }
        return redirect()->route('admin.linea.show',$request->linea_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DuenioLinea  $duenioLinea
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $duenio=Duenio::all()->find($id);
        $dueniolineas=DuenioLinea::where('duenio_id',$id)->get();
        $linea=$duenio->duenioLineas->first()->linea;
        
        return view('Admin.user.aportes.show',compact('dueniolineas','duenio','linea'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DuenioLinea  $duenioLinea
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "pagar";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DuenioLinea  $duenioLinea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
 
        $request->validate([
            'aporte'=>'nullable|numeric',
            'fecha'=>'nullable|date',
            'descripcion'=>'nullable|string',
            'aporte_pagado'=>'required|numeric',
            'linea_id'=>'required'
         ]);
         $dl=DuenioLinea::all()->find($id);
        
         if(isset($dl)){
               $dl->aporte_pagado=$request->aporte_pagado;
               $dl->save();
               return redirect()->route('admin.dueniolinea.show',$dl->duenio->id);
         }else{
            return "ERROR, dueñoo línea no existe";
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DuenioLinea  $duenioLinea
     * @return \Illuminate\Http\Response
     */
    public function destroy(DuenioLinea $duenioLinea)
    {
        //
    }
}
