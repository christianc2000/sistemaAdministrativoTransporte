@extends('adminlte::page')

@section('title', 'EDITAR CARGO')

@section('content_header')
    <h1>Asignar Rol</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

<form action="{{route('users.update',$user)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="" class="col-form-labelel">Nombre</label>
      <input id="name" name="name" type="text" step="any" value="{{$user->name}}" required autofocus autocomplete="name" class="form-control" tabindex="1">
    </div>
<!--ERROR Nombre-->

<!--***************************************-->
    <h2 class="h5">Listado de roles</h2>
    @foreach ($roles as $role)
        <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{$role->id}}" id="flexCheckDefault" name="roles[]">
                <label class="form-check-label" for="flexCheckDefault">
                    {{$role->name}} 
                </label>
        </div>
    @endforeach

    {{-- <div class="mb-3">
        <label for="" class="col-form-label">Email</label>
        <input id="email" name="email" type="email" value="{{$user->email}}" required autofocus autocomplete="email" class="form-control" tabindex="2">
    </div> --}}
<!--ERROR Listado de roles-->

<!--***************************************-->
    {{-- <div class="mb-3">
        <label for="" class="col-form-label">Contraseña</label>
        <input id="password" name="password" type="password" step="any" value="{{$user->password}}" required autofocus autocomplete="password" class="form-control" tabindex="3">
    <!--***************************************-->
    </div> --}}
<!--ERROR password-->
<!--***************************************-->
{{-- <div class="form-group">

    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name"></label>
      <div class="col-md-9 col-sm-9 col-xs-18">

            <input type="radio" class="op" name="perfil_usuario" id="perfil_usuario" value="1"  {{($cargo->perfil_usuario == 1) ? 'checked': ''}}> CON USUARIO
            <br>
            <input type="radio" class="op" name="perfil_usuario" id="perfil_usuario" value="0"  {{($cargo->perfil_usuario == 0) ? 'checked' : '' }}> SIN USUARIO
        </div>
       </div> --}}
<!--***************************************-->
</div>
<!--ERROR Sueldo-->

        <a href="{{route('users.index')}}" class="btn btn-secondary  mt-2" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-primary mt-2" tabindex="4">Asignar rol</button>

  </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
