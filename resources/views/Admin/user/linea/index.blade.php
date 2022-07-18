@extends('adminlte::page')

@section('title', 'Línea')

@section('content_header')
    <h1>LISTA DE LÍNEAS</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.linea.create') }}" class="btn btn-primary">Crear Línea</a>
        </div>
        <div class="card-body">
            <table id="tabla" class="table table-striped shadow-lg mt-4" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">LÍNEA</th>
                        <th scope="col">SEDE</th>
                        <th scope="col">FOTO</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($lineas as $linea)
                        <tr>
                            <td scope="col" style="text-align:center; font-weight: 900">{{ $linea->nrolinea }}</td>

                            <td scope="col">{{ $linea->sede }}</td>
                            <td scope="col"><img src="{{ asset($linea->foto) }}" alt="" width="130"
                                    height="120"></td>
                            <td>
                                <form action="{{ route('admin.linea.destroy', $linea->id) }}" method="POST">
                                    <a href="{{ route('admin.linea.show', $linea->id) }}"
                                        class="btn btn-primary">Dueños</a>
                                    <a href="{{ route('admin.permiso.show', $linea->id) }}"
                                        class="btn btn-warning">Permisos</a>
                                    <a href="{{ route('admin.linea.edit', $linea->id) }}"
                                        class="btn btn-success">Editar</a>
                                    @csrf
                                    <!--metodo para añadir token a un formulario-->
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
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
                scrollY: '280px',
                scrollCollapse: true,

            });
        });
    </script>

@stop
