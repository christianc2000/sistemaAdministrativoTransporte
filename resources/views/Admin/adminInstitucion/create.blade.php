@extends('adminlte::page')

@section('title', 'CREAR ADMINISTRADOR DE INSTITUCION')

@section('content_header')
    <h1>Crear Administrador de institucion</h1>
@stop

@section('content')
    <form action="{{ route('administradorInstitucions.store') }}" method="POST">
        @csrf
        @if (count($errors) > 0)
            <div class="alert alert-danger" rote="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </ul>
            </div>

        @endif
        
        <div class="mb-3">
            <label for="" class="col-form-labelel">Seleccionar institucion</label>
            <div></div>
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="institucion_id">
                {{-- <option selected>seleccionar Institucion</option> --}}
                @foreach ($institucions as $institucion)
                    {{-- <option value="{{$user->ci}}" >{{$user}} </option> --}}
                    <option value="{{ $institucion->id }}">{{ $institucion->nombre }}</option>
                @endforeach
            </select>

            @error('institucion_id')
                <br>
                <small>{{ $message }} </small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="" class="col-form-labelel">ci</label>
            <input id="ci" name="ci" type="text" step="any" value="" class="form-control"
                tabindex="1" required autofocus autocomplete="ci">
            @error('ci')
                <br>
                <small>{{ $message }} </small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="" class="col-form-labelel">Nombre</label>
            <input id="codigo" name="name" type="text" step="any" value="" class="form-control"
                tabindex="1" required autofocus autocomplete="codigo">
            @error('name')
                <br>
                <small>{{ $message }} </small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="col-form-labelel">Apellido</label>
            <input id="apellido" name="apellido" type="text" step="any" value="" class="form-control"
                tabindex="1" required autofocus autocomplete="apellido">
            @error('apellido')
                <br>
                <small>{{ $message }} </small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="col-form-labelel">Sexo</label>
            <div></div>
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="sexo">
                <option selected>seleccionar sexo</option>
                <option value="M">Masculino</option>
                <option value="F">femenino</option>
            </select>

            @error('sexo')
                <br>
                <small>{{ $message }} </small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="col-form-labelel">fecha de nacimiento</label>
            <input id="fecha_nac" name="fecha_nac" type="date" step="any" value="" class="form-control"
                tabindex="1" required autofocus autocomplete="fecha_nac">
            @error('fecha_nac')
                <br>
                <small>{{ $message }} </small>
            @enderror
        </div>
        <!--ERROR NOmbre-->

        <!--***************************************-->
        <div class="mb-3">
            <label for="" class="col-form-label">Telefono</label>
            <input id="telefono" name="telefono" type="number" class="form-control" tabindex="2" required autofocus
                autocomplete="telefono">
            @error('email')
                <br>
                <small>*{{ $message }} </small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="col-form-labelel">Correo electronico</label>
            <input id="email" name="email" type="email" step="any" value="" class="form-control"
                tabindex="1" required autofocus autocomplete="email">
            @error('email')
                <br>
                <small>{{ $message }} </small>
            @enderror
        </div>
        {{-- <div class="mb-3">
            <label for="" class="col-form-label">Tipo deconductor</label>
            <div></div>
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                <option selected>seleccionar</option>
                <option value="A">A</option>
                <option value="I">I</option>
            </select>
            @error('tipo')
                <br>
                <small>*{{ $message }} </small>
            @enderror
        </div> --}}
        <!--ERROR correo electronico-->

        <!--***************************************-->
        <div class="mb-3">
            <label for="" class="col-form-label">Contraseña</label>
            <input id="sueldo" name="password" type="password" step="any" class="form-control" tabindex="3"
                required autofocus autocomplete="sueldo">
            @error('password')
                <br>
                <small>*{{ $message }} </small>
            @enderror
            <!--***************************************-->
        </div>
        <!--ERROR contraseña-->

        <!--***************************************-->
        <div class="mb-3">
            <label class="control-label col-md-2 col-sm-3 col-xs-12">Lista de roles</label>
            @foreach ($roles as $role)
                <div class="form-check">
                    <input type="radio" class="op" name="rol" id="{{ $role->id }}" value="{{ $role->id }}">
                    <label for="{{ $role->id }}">{{ $role->name }} </label>
                </div>
            @endforeach
            @error('rol')
                <small>*{{ $message }} </small>
            @enderror
        </div>

        <!--asignar rol-->
        <a href="{{ route('administradorInstitucions.index') }}" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-outline-success" tabindex="4">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
