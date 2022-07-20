<?php

namespace App\Http\Controllers;

use App\Models\ChoferMicro;
use App\Models\Duenio;
use App\Models\Linea;
use App\Models\Lineas;
use App\Models\PermisoLinea;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use PhpParser\ErrorHandler\Collecting;

class PermisoLineaController extends Controller
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
            'linea_id' => 'required|numeric',
            'duenio_id' => 'nullable|numeric'
        ]);
        if ($request->duenio_id != null) {
            $pl = PermisoLinea::create([
                'duenio_id' => $request->duenio_id,
                'linea_id' => $request->linea_id
            ]);
        }
        return redirect()->route('admin.permiso.show', $request->linea_id);
    }
    public function storeOne(Request $request)
    {
        $request->validate([
            'linea_id' => 'required|numeric',
            'duenio_id' => 'required|numeric'
        ]);
      
            $pl = PermisoLinea::create([
                'duenio_id' => $request->duenio_id,
                'linea_id' => $request->linea_id
            ]);
       
        return redirect()->route('admin.permiso.showOne', $request->duenio_id);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PermisoLinea  $permisoLinea
     * @return \Illuminate\Http\Response
     */
    //MOSTRAR TODOS LOS PERMISOS PERTENECIENTES AL ID DE LA LÍNEA
    public function show($id)
    { //el id de la linea
        $linea = Linea::all()->find($id);
        $permisolineas = PermisoLinea::where('linea_id', $linea->id)->get();

        $duenios = Duenio::join('duenio_lineas', 'duenios.id', '=', 'duenio_lineas.duenio_id')
            ->join('lineas', 'lineas.id', 'duenio_lineas.linea_id')
            ->where('duenio_lineas.linea_id', $linea->id)
            ->select('duenios.*')
            ->groupBy('duenios.id')
            ->orderBy('duenios.id', 'asc')
            ->get();

        return view('Admin.user.permisolineas.show', compact('linea', 'permisolineas', 'duenios'));
    }
    //MOSTRAR TODOS LOS PERMISOS PERTENECIENTES AL ID DE UN DUEÑO
    public function showOne($id)
    { //el id de la linea
        $duenio = Duenio::all()->find($id);
        

        $permisolineas =  PermisoLinea::where('duenio_id', $duenio->id)->get();
       
        $chofer_micros=ChoferMicro::where('fecha_baja',null)->get();
        // return $permisolineas;
        if ($permisolineas!=null){
             $linea=$duenio->duenioLineas->first()->linea;
          
        }else{
            $linea = Linea::all()->find($permisolineas[0]['linea_id']);
        }
      

        return view('Admin.user.permisolineas.showDuenio', compact('linea', 'permisolineas', 'duenio', 'chofer_micros'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PermisoLinea  $permisoLinea
     * @return \Illuminate\Http\Response
     */
    public function edit(PermisoLinea $permisoLinea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PermisoLinea  $permisoLinea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PermisoLinea  $permisoLinea
     * @return \Illuminate\Http\Response
     */
    public function destroy(PermisoLinea $permisoLinea)
    {
        //
    }
}
