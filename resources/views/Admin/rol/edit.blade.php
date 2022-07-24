@extends('adminlte::page')

@section('title', 'EDITAR ROL')

@section('content_header')
    <h1>Editar Rol</h1>
@stop

@section('content')
    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="col-form-labelel">Nombre</label>
            <input id="id" name="name" type="text" value="{{ $role->name }}" required autofocus
                autocomplete="id" class="form-control" tabindex="1">
        </div>
        {{-- $role->getPermissionNames()  me va a servir para el mostrar todos los permisos --}}
        <!--Nombre de rol-->
        <!--***************************************-->
        <div class="mb-3">


            <label for="" class="col-form-label">Lista de permisos</label>
            @foreach ($permissions as $permission)
                @php
                    $rolExist='';
                    if ($role->hasAnyPermission($permission->name)){
                        $rolExist='checked';
                    }
                @endphp
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $permission->id }}"
                        id="{{ $permission->id }}" name="permissions[]" {{$rolExist}}>
                    <label class="form-check-label" for="{{ $permission->id }}">
                        {{ $permission->description }}
                    </label>
                </div>
            @endforeach

            @error('email')
                <br>
                <small>*{{ $message }} </small>
            @enderror
        </div>
        <!--lista de permisos-->

        <!--asignar rol-->
        <a href="{{ route('roles.index') }}" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
