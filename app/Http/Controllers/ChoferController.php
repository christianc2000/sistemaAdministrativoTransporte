<?php

namespace App\Http\Controllers;

use App\Models\Chofer;
use App\Models\ChoferMicro;
use App\Models\Micro;
use App\Models\Micros;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class ChoferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::Where('tipo', 'C')->get();
        // return $users;
        return view('Admin.chofer.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mic = Micro::all()->where('fecha_baja',!null);
        
        $micros=new Collection();
        if(isset($mic)){
            foreach($mic as $micro){
               if($micro->fecha_baja!=null){
                   $micros->push($micro);
               }
            }   
        }
       // return $micros;
        return view('Admin.chofer.create', compact('micros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = new User();
        $users->ci = $request->get('ci');
        $users->nombre = $request->get('name');
        $users->apellido = $request->get('apellido');
        $users->sexo = $request->get('sexo');
        $users->fecha_nac = $request->get('fecha_nac');
        $users->telefono = $request->get('telefono');
        $users->password = bcrypt($request->get('password'));
        $users->email = $request->get('email');
        $users->tipo = 'C';
        // $users->foto = $request->get('foto');
        $users->save();

        $chofer = new Chofer();
        $chofer->user_id = $users->id;
        $chofer->direccion = $request->get('direccion');
        $chofer->categoria_licencia = $request->get('cateLicen');



        if ($request->micro_id != null) {
            $chofermicro = new ChoferMicro();
            $chofermicro->chofer_id = $chofer->id;
            $chofermicro->micro_id = $request->get('micro_id');
            $chofermicro->fecha_asig = Date(now());
            $chofermicro->save();
            $chofer->activo = true;
        } else {
            $chofer->activo = false;
        }
        $chofer->save();

        return redirect()->route('chofers.index')->with('info', 'Se creó un nuevo usuario chofer'); //redirige a la vista index de la carpeta cargo

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chofer  $chofer
     * @return \Illuminate\Http\Response
     */
    public function show(Chofer $chofer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chofer  $chofer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        $micros = Micros::all();
        // $chofer= Chofer::all();
        $chofer = Chofer::where('user_id', $id)->first();

        $chofermicros = ChoferMicro::where('chofer_id', $chofer->id)->first();
        return view('Admin.chofer.edit', compact('users', 'micros', 'chofermicros', 'chofer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chofer  $chofer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $users = User::find($id);
        $users->ci = $request->get('ci');
        $users->nombre = $request->get('name');
        $users->apellido = $request->get('apellido');
        $users->sexo = $request->get('sexo');
        $users->fecha_nac = $request->get('fecha_nac');
        $users->telefono = $request->get('telefono');
        if ($request->password != 'xxxxxxxxx') {
            $users->password = bcrypt($request->get('password'));
        }
        $users->email = $request->get('email');
        // $users->foto = $request->get('foto');
        $users->save();

        $chofer = Chofer::where('user_id', $id)->first();
        $chofer->direccion = $request->get('direccion');
        $chofer->categoria_licencia = $request->get('cateLicen');
        $chofer->save();
        return redirect()->route('chofers.index')->with('info', 'Se editó el usuario chofer'); //redirige a la vista index de la carpeta cargo

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chofer  $chofer
     * @return \Illuminate\Http\Response
     */

    public function destroy(Chofer $chofer)
    {
    }
}
