@extends('adminlte::page')

@section('title', 'EDITAR ADMINISTRADOR')

@section('content_header')
    <h1>Editar Institucion</h1>
@stop

@section('content')
    <form action="{{ route('institucions.update', $institucion) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="col-form-labelel">Nombre</label>
            <input id="name" name="name" type="text" value="{{ $institucion->nombre }}" required autofocus autocomplete="name"
                class="form-control" tabindex="1">
        </div>
        <div class="mb-3">
            <label for="" class="col-form-labelel">Direccion</label>
            <input id="direccion" name="direccion" type="text" value="{{ $institucion->direccion }}" required autofocus autocomplete="name"
                class="form-control" tabindex="1">
        </div>
        
        <!--***************************************-->
        
        <div class="mb-3">
            <label for="" class="col-form-label">Telefono</label>
            <input id="telefono" name="telefono" type="number" class="form-control" tabindex="2" required autofocus value="{{ $institucion->telefono }}"
                autocomplete="telefono">
            @error('telefono')
                <br>
                <small>*{{ $message }} </small>
            @enderror
        </div>

        <!--***************************************-->
       
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
        <a href="{{ route('institucions.index') }}" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
