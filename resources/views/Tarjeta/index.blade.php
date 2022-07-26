@extends('adminlte::page')
@section('title', 'Tarjeta')

@section('content_header')
    <h3>Lista de Tarjetas</h3>
@stop

@section('content')
       <div class="card">
            <div class="card-header">
                <form action="{{route ('tarjetas.store')}}" method="POST">
                    @csrf
                    <input type="hidden" id="h" name="h" value="">
                    <a href="javascript: history.go(-1)" class="btn btn-primary"><i class="fa fa-arrow-left"></i></a>
                    <button type="submit" class="btn btn-primary">Crear Tarjeta</button>
                </form>
            </div>
            <div class="card-body">
                <div align='center'>
                <table id="tarjetas" class="table table-striped table-bordered" style="width:70%">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th scope="col"class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($tarjetas as $tarjeta)
                        <tr>
                            <td class="text-center">{{$tarjeta -> id}}</td>
                            <td class="text-center">
                                <form action="{{route ('tarjetas.destroy', $tarjeta -> id)}}" method="POST">
                             <!--   <a href="/tarjetas/{{$tarjeta -> id}}/edit" class="btn btn-warning">Editar</a>-->
                                @csrf
                                @method('delete')
                                <a href="{{route ('tarjetas.show', $tarjeta -> id)}}" class="btn btn-info">Mostrar</a>
                                <button type="submit" class="btn btn-danger">Borrar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
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
            $('#tarjetas').DataTable({
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