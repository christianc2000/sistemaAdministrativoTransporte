@extends('adminlte::page')

@section('title', 'Mostrar Linea')

@section('content_header')
    <h1>Dueños</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.duenio.create') }}" class="btn btn-primary">Crear Dueño</a>
        </div>
        <div class="card-body">
            <table id="tabla" class="table table-striped shadow-lg mt-4" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col" style="text-align:center">CI</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col" style="text-align:center">SEXO</th>
                        <th scope="col" style="text-align:center">TELEFONO</th>
                        <th scope="col">LINEA</th>
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

                            <td scope="col">
                                @if ($duenio->duenioLineas->first() != null)
                                    {{ $duenio->duenioLineas->first()->linea->nrolinea }}
                                @else
                                @endif

                            </td>
                            <td>

                                <a href="{{ route('admin.duenio.show', $duenio->id) }}" class="btn btn-primary">choferes</a>

                                <a href="{{ route('admin.dueniolinea.show', $duenio->id) }}"
                                    class="btn btn-warning">Aportes</a>

                                <a href="{{ route('admin.permiso.showOne', $duenio->id) }}"
                                    class="btn btn-secondary">Permiso</a>
                                <button type="button" id="btnEliminar" name="{{ $duenio}}" class="button btnElim"
                                    data-bs-toggle="modal" data-bs-target="#mEliminar">
                                    <span>Eliminar</span>
                                </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
    {{-- Modal para confirmar la eliminación --}}
    <div class="modal fade" id="mEliminar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background: #cc1818">
                    <h5 class="modal-title" id="staticBackdropLabel">Esperando confirmación...</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formulario" method="POST">
                    @csrf
                    <!--metodo para añadir token a un formulario-->
                    @method('delete')
                    <div class="modal-body">
                        <h5> ¿Estás seguro de eliminar al dueño? </h5>
                        <p id="parrafoModal"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><span>No</span></button>
                        <button type="submit" class="btn btn-danger"><span>Si</span></button>
                    </div>
                </form>
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
            background-color: #cc1818;
            border: none;
            color: #FFFFFF;
            text-align: center;
            font-size: 14px;
            padding: 10px;
            width: 100px;
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
            content: 'X';
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
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
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
            $('.btnElim').on('click', function(){
                vid=$(this).attr('name');
                vid=JSON.parse(vid);
                console.log(vid);
                c='No se podrá recuperar nada del dueño con carnet '+vid['ci']+' y nombre '+vid['nombre']+" "+vid['apellido'];
                $('#parrafoModal').text(c);
                $('#formulario').attr('action', "{{url('/admin/duenio')}}/"+vid['id']);
            });
        });
    </script>

@stop
