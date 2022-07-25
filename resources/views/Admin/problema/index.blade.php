@extends('adminlte::page')

@section('title', 'PROBLEMAS')

@section('content_header')
    <h1>Lista de Problemas de los choferes</h1>
@stop

@section('content')

    <table id="users" class="table table-striped table-bordered shadow-lg mt-3" style="width:100%">
        <thead class="bg-dark text-white">
            <tr>
                <th scope="col">FECHA</th>
                <th scope="col">PROBLEMA</th>
                <th scope="col">CHOFER</th>
                <th scope="col">LINEA</th>
                <th scope="col">ACCIONES</th>
            </tr>
        </thead>
        <TBODY>
            @foreach ($problemas as $problema)
                <tr>
                    <td>{{$problema->created_at}}</td>
                    <td>{{ $problema->descripcion}}</td>
                    <td>{{$problema->choferMicro->chofer->user->nombre}} {{$problema->choferMicro->chofer->user->apellido}}</td>
                    <td>{{ $problema->choferMicro->micro->permisoLinea->linea->nrolinea}}</td>
                    <td>


                        <form action="{{ route('admin.problema.destroy', $problema->id) }}" method="POST">
                            {{-- <a href="{{ route('users.edit', $user) }}" class="btn btn-primary">Asignar rol</a> --}}
                            @csrf <!--metodo para añadir token a un formulario-->
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                            {{-- <a href="{{ route('users.show', $user) }}" class="btn btn-primary">Mostrar</a> --}}
                        </form>

                    </td>
                </tr>
            @endforeach
        </TBODY>
    </table>


@stop

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
    integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">

@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src = "https://code.jquery.com/jquery-3.5.1.js" ></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#users').DataTable({
                "lengthMenu": [
                    [5, 10, 50, -1],
                    [5, 10, 50, "Todo"]
                ]
            });
        });
    </script>
@stop