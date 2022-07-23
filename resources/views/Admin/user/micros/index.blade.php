@extends('adminlte::page')

@section('title', 'Micros')

@section('content_header')
    <h1>LISTA DE VEHÍCULOS-MICROS</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.micro.create') }}" class="btn btn-primary">Crear Micro</a>
        </div>
        <div class="card-body">
            <table id="tabla" class="table table-striped shadow-lg mt-4" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Fecha</th>
                        <th scope="col" style="width: 200px ;text-align:center">NRO INTERNO</th>
                        <th scope="col" style="width: 200px ;text-align:center">PLACA</th>
                        <th scope="col" style="width: 150px ;text-align:center">LINEA</th>
                        <th scope="col" style="width: 200px ;text-align:center">DUEÑO</th>
                        <th scope="col" style="width: 200px ;text-align:center">ESTADO</th>
                        <th scope="col" style="width: 200px ;text-align:center">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($micros as $micro)
                        <tr>
                            <td>{{ $micro->fecha_asignacion }}</td>
                            <td scope="col" style="text-align:center;">{{ $micro->nro_interno }}</td>
                            <td scope="col" style="text-align:center;">{{ $micro->placa }}</td>
                            <td scope="col" style="text-align:center; font-weight: 900">
                                {{ $micro->permisoLinea->linea->nrolinea }}</td>
                            <td scope="col">
                                 {{$micro->permisoLinea->duenio->nombre}}   
                            </td>
                            <td scope="col" style="text-align:center">
                                @if (isset($micro->fecha_baja))
                                    {{-- bandera es true significa que todo está en orden --}}
                                    <div style="border-radius: 4em; background: rgb(224, 128, 128);">De baja</div>
                                @else
                                    <div style="border-radius: 4em; background: rgb(151, 245, 182);">Activo</div>
                                @endif
                            </td>

                            <td scope="col">
                                <form action="{{ route('admin.linea.destroy', $micro->id) }}" method="POST">
                                    <div class="row">
                                       
                                        @csrf
                                        <!--metodo para añadir token a un formulario-->
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger col-sm-6 mb-2"
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
