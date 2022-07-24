<?php

namespace App\Http\Controllers;

use App\Models\AdministradorInstitucion;
use App\Models\Duenio;
use App\Models\Institucion;
use App\Models\Linea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LineaController extends Controller
{
    public function index()
    {
        /* $chofer=User::all()->where('tipo','C');
        return view('inicio.foto',compact('chofer'));*/
        $lineas = Linea::all();

        return view('Admin.user.linea.index', compact('lineas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $institucions = Institucion::all();
        /*$adminInstitucions=User::where('tipo','I')->get();
*/
        $adminInstitucions = AdministradorInstitucion::join('users', 'users.id', '=', 'administrador_institucions.user_id')
            ->select('administrador_institucions.id', 'users.ci', 'users.nombre', 'administrador_institucions.institucion_id')
            ->groupBy('administrador_institucions.id', 'users.ci', 'users.nombre', 'administrador_institucions.institucion_id')
            ->orderBy('administrador_institucions.id', 'asc')
            ->get();
        $adminInstitucions = collect($adminInstitucions);
        return view('Admin.user.linea.create', compact('institucions', 'adminInstitucions'));
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
            'nrolinea' => 'required|integer|unique:lineas',
            'sede' => 'required|string', //lugar de la sede
            'telefono' => 'required|integer',
            'institucion_id' => 'required|integer',
            'administrador_institucion_id' => 'required',
            'foto' =>  'required|mimes:jpg,jpeg,bmp,png|max:2048|nullable',
        ]);

        $linea = new Linea();
        $linea->nrolinea = $request->nrolinea;
        $linea->telefono = $request->telefono;
        $linea->sede = $request->sede;
        $linea->institucion_id = $request->institucion_id;

        $array = $request->administrador_institucion_id;

        $linea->administrador_institucion_id = $array[0];
        if ($request->hasFile('foto')) {
            $folder = "public/lineas";
            $imagen = $request->file('foto')->store($folder); //Storage::disk('local')->put($folder, $request->image, 'public');
            $url = Storage::url($imagen);
            $linea->foto = $url;
        }
        $linea->save();
        return redirect()->route('admin.linea.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lineas  $lineas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $linea = Linea::all()->find($id);

        if (isset($linea)) {
            //**********aportes del duenio
            $duenios = Duenio::join('duenio_lineas', 'duenios.id', '=', 'duenio_lineas.duenio_id')
                ->join('lineas', 'lineas.id', 'duenio_lineas.linea_id')
                ->where('duenio_lineas.linea_id', $linea->id)
                ->select('duenios.*')
                ->groupBy('duenios.id')
                ->orderBy('duenios.id', 'asc')
                ->get();
            /*  $duenios = DuenioLinea::join('duenios','duenio_lineas.duenio_id', '=', 'duenios.id')
            ->join('lineas','lineas.id','duenio_lineas.linea_id')
            ->where('duenio_lineas.linea_id','=',$linea->id)
            ->select('duenios.*')
            ->groupBy('duenios.id.*')
            ->orderBy('duenios.id','asc')
            ->get();*/
            
            return view('Admin.user.linea.show', compact('duenios', 'linea'));
        } else {
            return "ERROR, línea no existe en la base de datos";
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lineas  $lineas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $linea = Linea::all()->find($id);
        $institucions = Institucion::all();
        $adminInstitucions = AdministradorInstitucion::join('users', 'users.id', '=', 'administrador_institucions.user_id')
            ->select('administrador_institucions.id', 'users.ci', 'users.nombre', 'administrador_institucions.institucion_id')
            ->get();
        return view('Admin.user.linea.edit', compact('linea', 'institucions', 'adminInstitucions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lineas  $lineas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'nrolinea' => 'required|integer',
            'sede' => 'required|string', //lugar de la sede
            'telefono' => 'required|integer',
            'institucion_id' => 'required|integer',
            'administrador_institucion_id' => 'required',
            'foto' =>  'mimes:jpg,jpeg,bmp,png|max:2048|nullable',
        ]);

        $linea = Linea::all()->find($id);
        if (isset($linea)) {
            $linea->nrolinea = $request->nrolinea;
            $linea->telefono = $request->telefono;
            $linea->sede = $request->sede;
            $linea->institucion_id = $request->institucion_id;

            $array = $request->administrador_institucion_id;

            $linea->administrador_institucion_id = $array[0];
            if ($request->hasFile('foto')) {
                $folder = "public/lineas";
                if ($linea->image != null) { //si entra es para actualizar su foto borrando la que tenía, si no tenía entonces no entra
                    Storage::delete($linea->foto);
                }
                $imagen = $request->file('foto')->store($folder); //Storage::disk('local')->put($folder, $request->image, 'public');
                $url = Storage::url($imagen);
                $linea->foto = $url;
            }
            $linea->save();
            return redirect()->route('admin.linea.index');
        } else {
            return "FALLO, linea no existe en la base de datos";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lineas  $lineas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $linea = Linea::all()->find($id);
        if (isset($linea)) {
            $linea->delete();
            return redirect()->route('admin.linea.index');
        } else {
            return "ERROR: No existe la línea";
        }
    }
}
