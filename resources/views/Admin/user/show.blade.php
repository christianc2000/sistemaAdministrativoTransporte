@extends('adminlte::page')

@section('title', 'CREAR VENTA')

@section('content_header')
    <h1>Detalle de Usuario</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <h5 class="card-title m-2">Detalle de usuario</h5>
                <div class="card-body">
                    <h4>ID: <small>{{ $user->id }}</small></h4>
                    <h4>Nombre de usuario: <small>{{ $user->name }}</small></h4>
                    
                    <h4>Email: <small>{{ $user->email }}</small></h4>
                    <h4>Creacion de Cuenta: <small>{{ $user->created_at }}</small></h4>
                </div>
            </div>
        </div>
        {{-- <div class="col-sm-6">
            <div class="card">
                <h5 class="card-title m-2">Trabajador al que pertenece</h5>
                <div class="card-body">
                    <h4>Id: <small>{{ $trabajador->ci_trabajador }}</small></h4>
                    <h4>Nombre: <small>{{ $user->name }}</small></h4>
                    <h4>Correo electronico: <small>{{ $user->email }}</small></h4>
                </div>
            </div>
        </div> --}}
    </div>
    
    <a href="{{ route('users.index') }}" class="btn btn-primary mb-3" tabindex="5">Volver</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
