@extends('adminlte::page')
@section('title', 'Chofer Tarjeta')

@section('content_header')
    <h3>Lista de Chofer-Tarjeta</h3>
@stop

@section('content')
       <div class="card">
            <div class="card-header"> 
                <a href="chofertarjetas/create" class="btn btn-primary">Crear Registro</a>
                <a href="/tarjetas" class="btn btn-info">Ver Tarjetas</a> </div>
            <div class="card-body">
                <table id="chofertarjeta" class="table table-striped shadow-lg mt-4" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Nro. Interno</th>
                            <th>Chofer</th>
                            <th>ID Tarjeta</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($chofertarjetas as $chofertarjeta)
                        <tr>
                            <td>{{$chofertarjeta -> id}}</td>
                            <td>{{$chofertarjeta -> fecha}}</td>
                            <td>{{$chofertarjeta -> nro_interno}}</td>
                            <td>{{$chofertarjeta -> nombre}} {{$chofertarjeta -> apellido}}</td>
                            <td>{{$chofertarjeta -> tarjeta_id}}</td>
                            <td>
                                <form action="{{route ('chofertarjetas.destroy', $chofertarjeta -> id)}}" method="POST">
                                <a href="/chofertarjetas/{{$chofertarjeta -> id}}/edit" class="btn btn-warning">Editar</a>
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Borrar</button>
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
            $('#chofertarjeta').DataTable({
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