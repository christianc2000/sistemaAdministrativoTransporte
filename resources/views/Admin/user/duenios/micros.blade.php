@extends('adminlte::page')

@section('title', 'Mostrar Linea')

@section('content_header')
    <h1>Micros - {{ $duenio->nombre }} {{ $duenio->apellido }} - Línea {{ $linea->nrolinea }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.micro.create') }}" class="btn btn-primary">Crear Micro</a>
        </div>
        <div class="card-body">
            <table id="tabla" class="table table-striped" style="width:100%">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col" style="width: 150px">PLACA</th>
                        <th scope="col">MODELO</th>
                        <th scope="col">FECHA ASIGNACIÓN</th>
                        <th scope="col">ESTADO</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($micros as $micro)
                        <tr>
                            <td scope="col">{{ $micro->placa }}</td>
                            <td scope="col">{{ $micro->modelo }}</td>
                            <td scope="col">{{ $micro->fecha_asignacion }}</td>

                            @if ($micro->fecha_baja != null)
                                {{-- si entra significa que el micro está inactivo --}}
                                <td scope="col" style="text-align:center">
                                    <div style="border-radius: 4em; background: rgb(224, 128, 128)">Inactivo</div>
                                </td>
                            @else
                                <td scope="col" style="text-align:center">
                                    <div style="border-radius: 4em; background: rgb(151, 245, 182)">Activo</div>
                                </td>
                            @endif

                            <td>
                                <button class="btn btn-danger">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.permiso.showOne', $duenio->id) }}">
                <button class="btn btn-danger">Retroceder</button>
            </a>
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
    </style>


@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

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
                
            });
        });
    </script>
@stop
