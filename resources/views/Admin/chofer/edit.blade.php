@extends('adminlte::page')

@section('title', 'EDITAR ADMINISTRADOR INSTITUCION')

@section('content_header')
    <h1>Editar usuario chofer</h1>
@stop
@section('content')
    <form action="{{ route('chofers.update', $users->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="" class="col-form-labelel">Seleccionar Micro</label>
            <div></div>
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="micro_id">
                <option value="">Indefinido</option>
                @foreach ($micros as $micro)
                    {{-- <option value="{{$user->ci}}" >{{$user}} </option> --}}

                    <option value="{{ $micro->id }}">Placa:{{ $micro->placa }} -
                        Modelo:{{ $micro->modelo }} - Línea:{{ $micro->permisoLinea->linea->nrolinea }}
                    </option>
                @endforeach
            </select>


            @error('micro_id')
                <br>
                <small>{{ $message }} </small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="" class="col-form-labelel">C.I.</label>
            <input id="ci" name="ci" type="text" value="{{ $users->ci }}" required autofocus
                autocomplete="id" class="form-control" tabindex="1">
        </div>
        <div class="mb-3">
            <label for="" class="col-form-labelel">Nombre</label>
            <input id="name" name="name" type="text" value="{{ $users->nombre }}" required autofocus
                autocomplete="name" class="form-control" tabindex="1">
        </div>
        <div class="mb-3">
            <label for="" class="col-form-labelel">Apellido</label>
            <input id="apellido" name="apellido" type="text" value="{{ $users->apellido }}" required autofocus
                autocomplete="name" class="form-control" tabindex="1">
        </div>
        <!--ERROR codigo-->
        <div class="mb-3">
            <label for="" class="col-form-labelel">Sexo</label>
            <div></div>
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="sexo">
                <option value="M" {{ $users->sexo == 'M' ? 'selected' : '' }}>Masculino</option>
                <option value="F" {{ $users->sexo == 'F' ? 'selected' : '' }}>femenino</option>
            </select>
        </div>
        <!--***************************************-->
        <div class="mb-3">
            <label for="" class="col-form-labelel">fecha de nacimiento</label>
            <input id="fecha_nac" name="fecha_nac" type="date" step="any" value="{{ $users->fecha_nac }}"
                class="form-control" tabindex="1" required autofocus autocomplete="fecha_nac">
            @error('fecha_nac')
                <br>
                <small>{{ $message }} </small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="col-form-label">Telefono</label>
            <input id="telefono" name="telefono" type="number" class="form-control" tabindex="2" required autofocus
                value="{{ $users->telefono }}" autocomplete="telefono">
            @error('email')
                <br>
                <small>*{{ $message }} </small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="col-form-label">Correo electronico</label>
            <input id="email" name="email" type="email" value="{{ $users->email }}" required autofocus
                autocomplete="email" class="form-control" tabindex="2">
        </div>
        <!--ERROR nombre-->
        <div class="form-group">
            <label for="inputImagen" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-10">
                <div class="grid grid-cols-1 mt-4 mx-7">
                    <img id="imagenSeleccionada" style="max-height: 200px;" src="{{asset('chofer/'.$users->foto)}}">
                </div>
                <input class="form-control my-2" type="file" id="foto" name="foto" accept="image/*" value="{{$users->foto}}">
                    @error('foto')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
        </div>
        <!--***************************************-->
        <div class="mb-3">
            <label for="" class="col-form-label">Contraseña</label>
            <input id="precio" name="password" type="password" value="xxxxxxxxx" required autofocus autocomplete="precio"
                class="form-control" tabindex="2">
        </div>
        <!--ERROR contraseña-->

        <div class="mb-3">
            <label for="" class="col-form-labelel">Direccion</label>
            <input id="direccion" name="direccion" type="text" step="any" value="{{ $chofer->direccion }}"
                class="form-control" tabindex="1" required autofocus autocomplete="direccion">
            @error('direccion')
                <br>
                <small>{{ $message }} </small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="col-form-labelel">Seleccionar categoria licencia</label>
            <div></div>
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="cateLicen">
                {{-- <option >seleccionar categoria</option> --}}
                <option value="A" {{ $chofer->categoria_licencia == 'A' ? 'selected' : '' }}> Categoria A</option>
                <option value="B" {{ $chofer->categoria_licencia == 'B' ? 'selected' : '' }}>Categoria B</option>
                <option value="C" {{ $chofer->categoria_licencia == 'C' ? 'selected' : '' }}>Categoria C</option>
            </select>

            @error('cateLicen')
                <br>
                <small>{{ $message }} </small>
            @enderror
        </div>
        <!--***************************************-->

        {{-- <div class="mb-3">
            <label for="" class="col-form-label">Editar persona a la que pertenece</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="ci_trab"> --}}
        {{-- <option selected>Seleccionar</option> --}}
        {{-- <option value='{{ $user->ci_trab }}' selected>Mantener</option>
                <option value=''>Quitar trabajador</option>
                @foreach ($users as $user2) --}}
        {{-- <option value="{{$user->ci}}" >{{$user}} </option> --}}
        {{-- <option value="{{ $user2->id }}">{{ $user2->id }} {{ $user2->ap }} </option>
                @endforeach
            </select> --}}

        <!--***************************************-->
        {{-- </div> --}}
        <!--ERROR precio-->

        <!--***************************************-->

        {{-- <div class="mb-3">
                <label class="control-label col-md-2 col-sm-3 col-xs-12">Lista de roles</label>
                @foreach ($roles as $role)

                    @php
                        $rolExis = '';
                        if ($user->hasAnyRole($role->name)) {
                            $rolExis = 'checked';
                        }
                    @endphp

                    <div class="form-check">
                        <input type="radio" class="op" name="rol" id="{{ $role->id }}" value="{{ $role->id }}" {{$rolExis}}>
                        <label for="{{ $role->id }}">{{ $role->name }}</label>
                    </div>
                @endforeach
                @error('rol')
                    <small>*{{ $message }} </small>
                @enderror
            </div> --}}

        <!--asignar rol-->
        <a href="{{ route('chofers.index') }}" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">

@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function(e){
        $('#foto').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#imagenSeleccionada').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>
@stop
