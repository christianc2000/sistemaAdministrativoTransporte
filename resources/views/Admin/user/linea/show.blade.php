@extends('adminlte::page')

@section('title', 'Mostrar Linea')

@section('content_header')
    <h1>Dueños línea {{ $linea->nrolinea }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">

            <div class="form-group row">
                <div class="col-sm-3" style="text-align: center">
                    <div class="form-group row">
                        <img src="{{ asset($linea->foto) }}" class="enmarcar col-sm-12" alt="" width="160"
                            height="150">
                    </div>
                    <!-- Button trigger modal -->
                    <div class="form-group row" style="height: 20px;">
                        <div class="col-sm-12" style="text-align: center">
                            <button type="button" class="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                style="background: rgb(73, 116, 82); ">
                                <span>Aporte</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="form-group row" style="margin-left: 5px">
                        <label for="labelSede" class="col-sm-2 col-form-label">Sede</label>
                        <div class="col-sm-10">
                            <label for="sede" class="col-form-label"
                                style="font-weight: normal">{{ $linea->sede }}</label>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-left: 5px">
                        <label for="labelTelefono" class="col-sm-2 col-form-label">Telefono</label>
                        <div class="col-sm-10">
                            <label for="telefono" class="col-form-label"
                                style="font-weight: normal">{{ $linea->telefono }}</label>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-left: 5px">
                        <label for="labelduenio" class="col-sm-2 col-form-label">Dueños</label>
                        <div class="col-sm-10">
                            <label for="duenio" class="col-form-label"
                                style="font-weight: normal">{{ $duenios->count() }}</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Crear Aporte</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                   <form action="{{route('admin.dueniolinea.store')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row" style="margin-left: 5px">
                            <label for="labelAporte" class="col-sm-2 col-form-label">Aporte</label>
                            <div class="col-sm-10">
                                <input name="aporte" type="number" step="0.01" class="form-control" id="aporte"
                                    placeholder="Monto aporte" required>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-left: 5px">
                            <label for="labelFecha" class="col-sm-2 col-form-label">Fecha</label>
                            <div class="col-sm-10">
                                <input name="fecha" type="date" class="form-control" id="fecha" required>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-left: 5px">
                            <label for="labelLinea" class="col-sm-2 col-form-label">Linea</label>
                            <div class="col-sm-10">
                                <input name="linea_id" type="numeric" class="form-control" id="linea_id"
                                    value="{{ $linea->nrolinea }}" readonly required>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-left: 5px">
                            <label for="labelDescripcion" class="col-sm-2 col-form-label">Detalle</label>
                            <div class="col-sm-10">
                                <textarea name="descripcion" class="form-control" id="descripcion" cols="30" rows="5"></textarea>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="button btn-form"
                            style="background: rgb(75, 204, 97)"><span>Registrar</span></button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table id="tabla" class="table table-striped shadow-lg mt-4" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col" style="text-align:center">CI</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col" style="text-align:center">SEXO</th>
                        <th scope="col">ESTADO APORTES</th>
                        <th scope="col" style="text-align:center">TELEFONO</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($duenios as $duenio)
                        <tr>
                            <td scope="col" style="text-align:center; font-weight: 900">{{ $duenio->ci }}</td>
                            <td scope="col">{{ $duenio->nombre }} {{ $duenio->apellido }}</td>
                            <td scope="col" style="text-align:center">{{ $duenio->sexo }}</td>
                            @php
                                $bandera = false;
                                foreach ($duenio->duenioLineas as $dueniolinea) {
                                    if ($dueniolinea->aporte > $dueniolinea->aporte_pagado) {
                                        $bandera = true;
                                    }
                                }
                            @endphp
                            @if ($bandera)
                                {{-- bandera es true significa que todo está en orden --}}
                                <td scope="col" style="text-align:center">
                                    <div style="border-radius: 4em; background: rgb(224, 128, 128)">Pagos pendientes</div>
                                </td>
                            @else
                                <td scope="col" style="text-align:center">
                                    <div style="border-radius: 4em; background: rgb(151, 245, 182)">Todo en orden</div>
                                </td>
                            @endif
                            <td scope="col" style="text-align:center">{{ $duenio->telefono }}</td>
                            <td>
                                <a href="{{ route('admin.dueniolinea.show', $duenio->id) }}"
                                    class="btn btn-primary">Mostrar</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.linea.index') }}" class="btn btn-primary">Volver</a>
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
    <style type="text/css">
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
            content: '$$';
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
                scrollY: '250px',
                scrollCollapse: true,
            });
        });
    </script>
    <script>
        console.log('Hi!');
    </script>

@stop
