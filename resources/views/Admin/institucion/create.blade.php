@extends('adminlte::page')

@section('title', 'CREAR INSTITUCION')

@section('content_header')
    <h1>Crear Institucion</h1>
@stop

@section('content')
    <form action="{{ route('institucions.store') }}" method="POST">
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
            <label for="" class="col-form-labelel">Nombre de insitucion</label>
            <input id="name" name="name" type="text" step="any" value="" class="form-control"
                tabindex="1" required autofocus autocomplete="name">
            @error('name')
                <br>
                <small>{{ $message }} </small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="" class="col-form-labelel">Direccion</label>
            <input id="direccion" name="direccion" type="text" step="any" value="" class="form-control"
                tabindex="1" required autofocus autocomplete="direccion">
            @error('direccion')
                <br>
                <small>{{ $message }} </small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="col-form-labelel">Telefono</label>
            <input id="telefono" name="telefono" type="number" step="any" value="" class="form-control"
                tabindex="1" required autofocus autocomplete="telefono">
            @error('telefono')
                <br>
                <small>{{ $message }} </small>
            @enderror
        </div>
        
        <a href="{{ route('institucions.index') }}" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-outline-success" tabindex="4">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
