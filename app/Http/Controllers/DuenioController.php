<?php

namespace App\Http\Controllers;

use App\Models\Chofer;
use App\Models\Duenio;
use App\Models\DuenioLinea;
use App\Models\Lineas;
use App\Models\Micro;
use App\Models\PermisoLinea;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DuenioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $duenios = Duenio::all();
        $lineas = Lineas::all();
        return view('Admin.user.duenios.index', compact('duenios', 'lineas'));
    }
    public function activarMicro($id)
    {
        $micro = Micro::all()->find($id);
        $micro->fecha_baja = null;
        $micro->save();
        $duenio = $micro->permisoLinea->duenio;
        return redirect()->route('admin.duenio.micro', $duenio->id);
    }
    public function eliminarMicro($id)
    {
        $micro = Micro::all()->find($id);
        $duenio=$micro->permisoLinea->duenio;
        $micro->delete();
        return redirect()->route('admin.duenio.micro',$duenio->id);
    }
    public function micros($id)
    {
        $duenio = Duenio::all()->find($id);

        $linea = $duenio->duenioLineas->first()->linea;
        $permisos = $duenio->permisoLineas;
        $micros = new Collection();
        foreach ($permisos as $permiso) {
            $microsp = $permiso->micros;
            foreach ($microsp as $micro) {
                $micros->push($micro);
            }
        }

        return view('Admin.user.duenios.micros', compact('duenio', 'linea', 'micros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lineas = Lineas::all()->sortByDesc('nrolinea');
        return view('Admin.user.duenios.create', compact('lineas'));
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
            'ci' => 'required|string|unique:duenios',
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'sexo' => 'required|string|max:1',
            'fecha_nac' => 'required|date',
            'email' => 'required|email|unique:duenios',
            'telefono' => 'required|integer',
            'linea_id' => 'required|integer'
        ]);
        $duenio = new Duenio();

        $duenio->ci = $request->ci;
        $duenio->nombre = $request->nombre;
        $duenio->apellido = $request->apellido;
        $duenio->sexo = $request->sexo;
        $duenio->fecha_nac = $request->fecha_nac;
        $duenio->email = $request->email;
        $duenio->telefono = $request->telefono;

        $duenio->save();

        $dl = DuenioLinea::create([
            'linea_id' => $request->linea_id,
            'duenio_id' => $duenio->id,
            'aporte' => 0,
            'fecha' => date(now())
        ]);

        return redirect()->route('admin.duenio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Duenio  $duenio
     * @return \Illuminate\Http\Response
     */
    public function bajaChofer($id)
    {
        $chofer = Chofer::all()->find($id);
        $cm = $chofer->choferMicros->where('fecha_baja', null)->first();
        $duenio = $cm->micro->permisoLinea->duenio;

        $cm->fecha_baja = date(now());
        $cm->save();
        $chofer->activo = false;
        $chofer->save();
        return redirect()->route('admin.duenio.show', $duenio->id);
    }
    public function show($id)
    {
        $duenio = Duenio::all()->find($id);

        $linea = $duenio->duenioLineas->first()->linea;

        $permisos = $duenio->permisoLineas;

        $chofers = new Collection();

        if ($permisos->first() != null) {
            foreach ($permisos as $permiso) {

                $m = $permiso->microActivo->first();
                $m = Micro::all()->find($m->id);

                $mic = $m->choferMicros->where('fecha_baja', null)->first();

                if (isset($mic)) {
                    $chof = $m->choferMicros->first();
                    $chof = Chofer::all()->find($mic->chofer->id);

                    $chofers->push($chof);
                }
            }
        }

        return  view('Admin.user.duenios.chofer', compact('chofers', 'duenio', 'linea'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Duenio  $duenio
     * @return \Illuminate\Http\Response
     */
    public function edit(Duenio $duenio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Duenio  $duenio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Duenio $duenio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Duenio  $duenio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $duenio = Duenio::all()->find($id);
        $duenio->delete();
        return redirect()->route('admin.duenio.index');
    }
}
