<?php

namespace App\Http\Controllers;

use App\Models\Lineas;
use Illuminate\Http\Request;

class LineasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lineas=Lineas::all();
        
        return view('inicio.foto',compact('lineas'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lineas  $lineas
     * @return \Illuminate\Http\Response
     */
    public function show(Lineas $lineas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lineas  $lineas
     * @return \Illuminate\Http\Response
     */
    public function edit(Lineas $lineas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lineas  $lineas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lineas $lineas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lineas  $lineas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lineas $lineas)
    {
        //
    }
}
