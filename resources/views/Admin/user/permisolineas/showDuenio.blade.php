@extends('adminlte::page')

@section('title', 'Línea')

@section('content_header')
    <h1>LISTA DE PERMISOS DEL DUENIO </h1>
    <h2>{{ $duenio->nombre }} {{ $duenio->apellido }} - Línea {{ $linea->nrolinea }}</h2>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="form-group row ">
                <div class="col-sm-4" style="text-align: center">
                    <button type="button" class="button" data-bs-toggle="modal" data-bs-target="#modalPermisoOne"
                        style="background: #00d8c1; ">
                        <span>Crear Permiso</span>
                    </button>
                </div>
                <div class="col-sm-4" style="text-align: center">
                    <button type="button" class="button" data-bs-toggle="modal" data-bs-target="#modalMicroOne"
                        style="background: #009AAC; ">
                        <span>Asignar Permiso</span>
                    </button>
                </div>

                <div class="col-sm-4" style="text-align: center">
                    <a href="{{route('admin.duenio.micro',$duenio->id)}}">
                        <button type="button" class="button"
                        style="background: #f4511e; ">
                        <span>Micros</span>
                    </button>
                    </a>
                </div>
            </div>

        </div>
        <!-- Modal PERMISO-ONE -->
        <div class="modal fade" id="modalPermisoOne" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Crear Permiso</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.permiso.storeOne') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group row" style="margin-left: 5px">
                                <label for="labelLinea" class="col-sm-2 col-form-label">Duenio</label>
                                <div class="col-sm-10">
                                    <label for="labelDuenio" class="col-sm-12 col-form-label"
                                        style="font-weight: normal">{{ $duenio->nombre }}
                                        {{ $duenio->apellido }}</label>
                                    <input name="duenio_id" type="numeric" class="form-control" id="duenio_id"
                                        value="{{ $duenio->id }}" hidden>
                                </div>

                            </div>
                            <div class="form-group row" style="margin-left: 5px">
                                <label for="labelLinea" class="col-sm-2 col-form-label">Línea</label>
                                <div class="col-sm-10">
                                    <label for="labellinea" class="col-sm-12 col-form-label"
                                        style="font-weight: normal">{{ $linea->nrolinea }}</label>
                                    <input name="linea_id" type="numeric" class="form-control" id="linea_id"
                                        value="{{ $linea->id }}" hidden>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="button btn-form"
                                style="background: rgb(75, 204, 97)"><span>Asignar Permiso</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal ASIGNAR PERMISO AL MICRO-ONE -->
        <div class="modal fade" id="modalMicroOne" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">ASIGNAR PERMISO</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="formulario" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group row" style="margin-left: 5px">
                                <label for="labelPermiso" class="col-sm-4 col-form-label">Seleccionar Permiso</label>
                                <div class="col-sm-8">
                                    <select name="permiso_id" id="permiso_id" class="form-control">
                                        <option value="" selected disabled>Seleccionar</option>
                                        @foreach ($permisolineas as $pl)
                                            @if (!$pl->activo)
                                                <option value="{{ $pl->id }}" name="{{ $pl }}">
                                                    Permiso - {{ $pl->id }} - linea {{ $linea->nrolinea }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="button btn-form"
                                style="background: rgb(75, 204, 97)"><span>Asignar Permiso</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="tabla" class="table table-striped shadow-lg mt-4" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">FECHA</th>
                        <th scope="col">ACTIVO</th>
                        <th scope="col">PLACA MICRO</th>
                        <th scope="col">CHOFER</th>
                        <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($permisolineas as $pl)
                        <tr>
                            <td scope="col" style=" font-weight: 900">{{ $pl->id }}</td>
                            <td scope="col">{{ $pl->created_at }}</td>
                            @if ($pl->activo)
                                {{-- bandera es true significa que todo está en orden --}}
                                <td scope="col" style="text-align:center">
                                    <div style="border-radius: 4em; background: rgb(151, 245, 182);">Activo</div>

                                </td>
                            @else
                                <td scope="col" style="text-align:center">
                                    <div style="border-radius: 4em; background: rgb(224, 128, 128);">Inactivo</div>

                                </td>
                            @endif

                            <td scope="col">

                                @if ($pl->microActivo->first() != null)
                                    {{ $pl->microActivo->first()->placa }}
                                @else
                                    Sin micro
                                @endif

                            </td>
                            <td scope="col">
                                @if ($pl->microActivo->first() != null)
                                    @if ($pl->microActivo->first()->choferMicros->first() != null)
                                    {{ $pl->microActivo->first()->choferMicros->first()->chofer->user->nombre}}
                                    @else
                                        Sin Chofer
                                    @endif
                                @else
                                    Sin Chofer
                                @endif

                                {{-- @if ($pl->microActivo->first()->choferMicros != null)
                                 
                                @else
                                    Sin Chofer
                                @endif --}}
                            <td>
                                <form action="{{ route('admin.permiso.destroy', $pl->id) }}" method="POST">
                                    <div class="row ">
                                        @if ($pl->microActivo->first()!=null)
                                        <a href="{{ route('admin.micro.baja',$pl->microActivo->first()->id) }}" class="col-sm-4"><button type="button" class="btn btn-primary" >Dar de baja micro</button></a>
                                        @endif
                                      @csrf
                                        <!--metodo para añadir token a un formulario-->
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger col-sm-4"
                                            style="width: 90px; margin-left: 5px ">Eliminar</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    {{-- cdn modal --}}
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    {{--  --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <style>
        .container-img {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .enmarcar {
            position: relative;
            border: 3px solid #acacac;
            border-radius: 4%;

        }

        .button {
            display: inline-block;
            border-radius: 4px;
            background-color: #f4511e;
            border: none;
            color: #FFFFFF;
            text-align: center;
            font-size: 14px;
            padding: 10px;
            width: 200px;
            transition: all 0.5s;
            cursor: pointer;
            margin: 5px;
        }

        .button span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .button span:after {
            content: '**';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        .button:hover span {
            padding-right: 25px;
        }

        .button:hover span:after {
            opacity: 1;
            right: 0;
        }
    </style>


@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    {{-- cdn modal --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    {{--  --}}

    <script>
        $(document).ready(function() {
            $('#tabla').DataTable({
                language: {
                    lengthMenu: 'Mostrar _MENU_ registros por página',
                    zeroRecords: 'No se encontró nada - lo siento',
                    info: 'Mostrando la página _PAGE_ de _PAGES_',
                    infoEmpty: 'No hay registros disponibles',
                    infoFiltered: '(filtrado de _MAX_ registros totales)',
                    search: "Buscar",
                },
                scrollY: '280px',
                scrollCollapse: true,

            });
        });
    </script>

@stop
