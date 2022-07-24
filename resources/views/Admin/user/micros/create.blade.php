@extends('adminlte::page')

@section('title', 'Micro')

@section('content_header')
    <h1>CREAR MICRO</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('admin.micro.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="inputNroInterno" class="col-sm-2 col-form-label">NroInterno</label>
                    <div class="col-sm-10">
                        <input name="nro_interno" type="text" class="form-control" id="nro_interno"
                            placeholder="Número interno del micro" value="{{ old('nro_interno') }}">
                        @error('nro_interno')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPlaca" class="col-sm-2 col-form-label">Placa</label>
                    <div class="col-sm-10">
                        <input name="placa" type="text" class="form-control" id="placa"
                            placeholder="Escriba la placa" value="{{ old('placa') }}">
                        @error('placa')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputModelo" class="col-sm-2 col-form-label">Modelo</label>
                    <div class="col-sm-10">
                        <input name="modelo" type="text" class="form-control" id="modelo"
                            placeholder="Escriba el modelo del Vehículo" value="{{ old('modelo') }}">
                        @error('modelo')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputCantidad_asiento" class="col-sm-2 col-form-label">Cantidad de asientos</label>
                    <div class="col-sm-10">
                        <input name="cant_asiento" type="number" class="form-control" id="cant_asiento"
                            placeholder="cantidad de asiento" value="{{ old('cant_asiento') }}">
                        @error('cant_asiento')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputfecha_asignacion" class="col-sm-2 col-form-label">Fecha de asignación</label>
                    <div class="col-sm-10">
                        <input name="fecha_asignacion" type="date" class="form-control" id="fecha_asignacion"
                            value="{{ old('fecha_asignacion') }}">
                        @error('fecha_asignacion')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                @php
                    $user = Auth::user();
                @endphp
                @if ($user->tipo == 'A')
                    <div class="form-group row">
                        <label for="inputDuenio" class="col-sm-2 col-form-label">Dueños</label>
                        <div class="col-sm-10">
                            <div class="boton-duenio" hidden>
                                <a href="{{ route('admin.duenio.create')}}" class="btn btn-primary">Crear Dueño</a>
                            </div>
                            <select class="form-control my-2" aria-label="Default select example" id="duenio_id"
                                name="duenio_id">
                                <option value="" selected disabled>Seleccionar</option>
                                @foreach ($duenios as $duenio)
                                    @if ($duenio->permisoLineas->where('activo', false)->first() != null)
                                        <option value="{{ $duenio->id }}"
                                            {{ old('duenio_id') == $duenio->id ? 'selected' : '' }}>
                                            {{ $duenio->ci }} - {{ $duenio->nombre }} {{ $duenio->apellido }} -
                                            linea
                                            {{ $duenio->permisoLineas->first()->linea->nrolinea }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            @error('duenio_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                @endif

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success">Guardar</button>
            </form>
            <a href="{{ url()->previous() }}">
                <button type="button" class="btn btn-dark">Retroceder</button>
            </a>

        </div>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        console.log('Hi!');
        $(document).ready(function() {
            date = new Date();
            anio = date.getFullYear();
            mes = String(date.getMonth() + 1).padStart(2, '0');
            dia = String(date.getDate()).padStart(2, '0');
            $("#fecha_asignacion").val(anio + '-' + mes + '-' + dia);

            n = $('#duenio_id option').length;
            if (n == 1) {
                $('.boton-duenio').attr('hidden', false);
            } else {
                $('.boton-duenio').attr('hidden', true);
            }


        });
    </script>

@stop
