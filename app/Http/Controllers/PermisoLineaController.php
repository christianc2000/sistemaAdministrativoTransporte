<?php

namespace App\Http\Controllers;

use App\Models\ChoferMicro;
use App\Models\Duenio;
use App\Models\Linea;
use App\Models\Lineas;
use App\Models\Micro;
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
            'linea_id' => 'nullable|numeric',
            'duenio_id' => 'nullable|numeric',
            'permiso_id' => 'nullable|numeric',
            'micro_id' => 'nullable|numeric'
        ]);
    
        if ($request->linea_id && $request->duenio_id) {
            $pl = PermisoLinea::create([
                'duenio_id' => $request->duenio_id,
                'linea_id' => $request->linea_id
            ]);
            $duenio=Duenio::all()->find($pl->duenio->id);
        } else if ($request->permiso_id && $request->micro_id) {
            
            $micro=Micro::all()->find($request->micro_id);
            $micro->fecha_baja=null;
            $micro->permiso_linea_id=$request->permiso_id;
            $micro->save();
            $permiso = PermisoLinea::all()->find($request->permiso_id);
            $permiso->activo=true;
            $permiso->save();
            $duenio=Duenio::all()->find($permiso->duenio->id);
        }
        return redirect()->route('admin.permiso.showOne', $duenio->id);
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
        $chofer_micros = ChoferMicro::where('fecha_baja', null)->get();

        if ($permisolineas != null) {
            $linea = $duenio->duenioLineas->first()->linea;
        } else {
            $linea = Linea::all()->find($permisolineas[0]['linea_id']);
        }

        $mic = Micro::join('permiso_lineas', 'micros.permiso_linea_id', '=', 'permiso_lineas.id')
            ->join('lineas', 'lineas.id', 'permiso_lineas.linea_id')
            ->where('permiso_lineas.linea_id', $linea->id)
            ->select('micros.*')
            ->groupBy('micros.id')
            ->orderBy('micros.id', 'asc')
            ->get();
      
        $micros=new Collection();
        if(isset($mic)){
            foreach($mic as $micro){
               if($micro->fecha_baja!=null){
                   $micros->push($micro);
               }
            }   
        }
        return view('Admin.user.permisolineas.showDuenio', compact('linea', 'permisolineas', 'duenio', 'chofer_micros','micros'));
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
    public function asignarPermiso($id)
    {
        $permiso = PermisoLinea::all()->find($id);
        $duenio = $permiso->duenio;
        $linea = $permiso->linea;
        $permisos = $duenio->permisoLineas;
        $micros = new Collection();

        foreach ($permisos as $perm) {
            if ($perm->micros->first() != null) {
                foreach ($perm->micros as $micro) {
                    $micros->push($micro);
                }
            }
        }

        return view('Admin.user.permisolineas.asignarMicro', compact('linea', 'duenio', 'permiso', 'micros'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PermisoLinea  $permisoLinea
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permiso=PermisoLinea::all()->find($id);
        $linea=$permiso->linea;
        $permiso->delete();
        return redirect()->route('admin.permiso.show', $linea->id);
    }
}
