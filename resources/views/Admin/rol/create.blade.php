@extends('adminlte::page')

@section('title', 'CREAR ROL')

@section('content_header')
    <h1>Crear nuevo rol</h1>
@stop

@section('content')
    <form action="{{ route('roles.store') }}" method="POST">
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
            <label for="" class="col-form-labelel">Nombre</label>
            <input id="codigo" name="name" type="text" step="any" value="" class="form-control" tabindex="1" required
                autofocus autocomplete="codigo">
            @error('name')
                <br>
                <small>*{{ $message }} </small>
            @enderror
        </div>
        <!--ERROR NOmbre-->

        <!--***************************************-->
        <div class="mb-3">
            <label for="" class="col-form-label">Lista de permisos</label>
            @foreach ($permissions as $permission)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{$permission->id}}" id="{{$permission->id}}" name="permissions[]">
                    <label class="form-check-label" for="{{$permission->id}}">
                        {{$permission->description}}
                    </label>
                </div>
            @endforeach

            @error('email')
                <br>
                <small>*{{ $message }} </small>
            @enderror
        </div>
        <!--lista de permisos-->

        <a href="{{ route('roles.index') }}" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-outline-success" tabindex="4">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
