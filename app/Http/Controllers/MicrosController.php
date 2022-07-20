<?php

namespace App\Http\Controllers;

use App\Models\Micros;
use Illuminate\Http\Request;

class MicrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $micros=Micros::all();
        return view('Admin.user.micros.index',compact('micros'));
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
     * @param  \App\Models\Micros  $micros
     * @return \Illuminate\Http\Response
     */
    public function show(Micros $micros)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Micros  $micros
     * @return \Illuminate\Http\Response
     */
    public function edit(Micros $micros)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Micros  $micros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Micros $micros)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Micros  $micros
     * @return \Illuminate\Http\Response
     */
    public function destroy(Micros $micros)
    {
        //
    }
}
