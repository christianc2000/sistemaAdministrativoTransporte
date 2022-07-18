@extends('adminlte::page')

@section('title', 'Aporte duenio')

@section('content_header')
    <h1>Aporte {{ $duenio->ci }} - {{ $duenio->nombre }} {{ $duenio->apellido }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-4 container-img">
                    <div class="form-group row">
                        <img src="{{ asset($linea->foto) }}" class="enmarcar" alt="" width="160" height="150">
                    </div>

                </div>


            </div>

        </div>
        <div class="card-body">
            <table id="tabla" class="table table-striped shadow-lg mt-4" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col" style="text-align:center">FECHA</th>
                        <th scope="col">APORTE</th>
                        <th scope="col" style="text-align:center">ESTADO</th>
                        <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($dueniolineas as $dueniolinea)
                        <tr>
                            <td scope="col" style="text-align:center; font-weight: 900">{{ $dueniolinea->fecha }}</td>
                            <td scope="col">{{ $dueniolinea->aporte }}</td>
                            @if ($dueniolinea->aporte == 0)
                                <td scope="col" style="text-align:center;">
                                    <div style="border-radius: 5em; background: rgb(224, 128, 128)">
                                        NO REALIZADO
                                    </div>
                                </td>
                            @else
                                <td scope="col" style="text-align:center; background: rgb(151, 245, 182)">REALIZADO</td>
                            @endif
                            <td>
                                <a href="{{ route('admin.dueniolinea.edit', $linea->id) }}"
                                    class="btn btn-warning">Pagar</a>
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

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
    </style>


@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

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
