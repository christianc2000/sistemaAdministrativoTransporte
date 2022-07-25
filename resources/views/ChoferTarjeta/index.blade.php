@extends('adminlte::page')
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">   
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Chofer Tarjeta</title>
  </head>
  <body>
  @section('content')
    <div class="container">
       <div class="card">
            <div class="card-header"> Chofer Tarjetas </div>
            <div class="card-body">
                <a href="chofertarjetas/create" class="btn btn-primary">Crear Registro</a>
                <a href="/tarjetas" class="btn btn-info">Ver Tarjetas</a>
                <table id="chofertarjeta" class="table table-striped mt-4" style="width:100%">
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

    </div>
    @endsection
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
        $(document).ready(function () {
        $('#chofertarjeta').DataTable();
        });
    </script>
   
  </body>
</html>