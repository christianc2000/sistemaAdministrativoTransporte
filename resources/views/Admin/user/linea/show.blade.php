@extends('adminlte::page')

@section('title', 'Mostrar Linea')

@section('content_header')
    <h1>Dueños línea {{ $linea->nrolinea }}</h1>
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
                <div class="col-8">
                    <div class="form-group row">
                        <label for="labelSede" class="col-sm-2 col-form-label">Sede</label>
                        <div class="col-sm-10">
                            <label for="sede" class="col-form-label"
                                style="font-weight: normal">{{ $linea->sede }}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="labelTelefono" class="col-sm-2 col-form-label">Telefono</label>
                        <div class="col-sm-10">
                            <label for="telefono" class="col-form-label"
                                style="font-weight: normal">{{ $linea->telefono }}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="labelduenio" class="col-sm-2 col-form-label">Dueños</label>
                        <div class="col-sm-10">
                            <label for="duenio" class="col-form-label"
                                style="font-weight: normal">{{ $duenios->count() }}</label>
                        </div>
                    </div>
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
                            <td scope="col" style="text-align:center">{{ $duenio->telefono }}</td>
                            <td>
                                <a href="{{ route('admin.duenio.show', $linea->id) }}"
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
