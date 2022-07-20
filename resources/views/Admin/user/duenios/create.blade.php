@extends('adminlte::page')

@section('title', 'Dueños')

@section('content_header')
    <h1>CREAR DUEÑO</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('admin.duenio.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="inputCI" class="col-sm-2 col-form-label">Carnet de Identidad</label>
                    <div class="col-sm-10">
                        <input name="ci" type="number" min="0" class="form-control" id="ci"
                            placeholder="Carnet de identidad" value="{{ old('ci') }}">
                        @error('ci')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputNOMBRE" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-10">
                        <input name="nombre" type="text" class="form-control" id="nombre"
                            placeholder="Nombre del dueño" value="{{ old('nombre') }}">
                        @error('nombre')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputAPELLIDO" class="col-sm-2 col-form-label">Apellido</label>
                    <div class="col-sm-10">
                        <input name="apellido" type="text" class="form-control" id="apellido"
                            placeholder="Apellido del dueño" value="{{ old('apellido') }}">
                        @error('apellido')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputSEXO" class="col-sm-2 col-form-label">Sexo</label>
                    <div class="col-sm-10">
                        <select class="form-control" aria-label="Default select example" id="sexo" name="sexo" value="{{ old('sexo') }}">
                            <option value="" selected disabled>Seleccionar</option>
                            <option value="M" {{ old('sexo') == "M" ? 'selected' : '' }}>
                                Masculino
                            </option>
                            <option value="F" {{ old('sexo') == "F" ? 'selected' : '' }}>
                                Femenino
                            </option>
                        </select>
                        @error('sexo')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputFECHANAC" class="col-sm-2 col-form-label">Fecha de Nacimiento</label>
                    <div class="col-sm-10">
                        <input name="fecha_nac" type="date" class="form-control" id="fecha_nac"
                            placeholder="Fecha de nacimiento" value="{{ old('fecha_nac') }}">
                        @error('fecha_nac')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEMAIL" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input name="email" type="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputTelefono" class="col-sm-2 col-form-label">Teléfono</label>
                    <div class="col-sm-10">
                        <input name="telefono" type="number" class="form-control" id="telefono" placeholder="Teléfono" value="{{ old('telefono') }}">
                        @error('telefono')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputLINEA" class="col-sm-2 col-form-label">Linea</label>
                    <div class="col-sm-10">
                        <select class="form-control" aria-label="Default select example" id="linea_id" name="linea_id" value="{{ old('linea_id') }}">
                            <option value="" selected disabled>Seleccionar</option>
                            @foreach ($lineas as $linea)
                                <option value="{{$linea->id}}" {{ old('linea_id') == $linea->id ? 'selected' : '' }}>
                                    {{$linea->nrolinea}}
                                </option>
                            @endforeach

                        </select>
                        @error('linea_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success" style="background: #008085; border:#008085">Guardar</button>
            </form>
            <a href="{{ route('admin.duenio.index') }}" class="btn btn-danger" style="border: #B42C40">Cancelar</a>
        </div>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <style>
        .enmarcar {
            position: relative;
            border: 3px solid #acacac;
            border-radius: 4%;
        }
    </style>
@stop

@section('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>


@stop
