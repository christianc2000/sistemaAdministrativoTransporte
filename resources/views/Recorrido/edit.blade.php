@extends('adminlte::page')
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Recorridos</title>
  </head>
  <body>
  @section('content')
    <div class="container">
       <div class="card">
            <div class="card-header"> Recorridos </div>
            <div class="card-body">
                <h2>Editar Registro</h2>
                <form action="{{route('recorridos.update',$recorrido->id)}}" method="POST">
                @csrf
                @method('PUT')
                    <div class="mb-3">
                        <label for="" class="form-label">Número de recorrido</label>
                        <input id="nro" name="nro" type="number" class="form-control" value="{{$recorrido->nro_recorrido}}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Hora Partida</label>
                        <input type="time" name="partida" step="1" class="form-control" value="{{$recorrido->hora_partida}}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Hora Llegada</label>
                        <input type="time" name="llegada" step="1" class="form-control" value="{{$recorrido->hora_llegada}}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">ID Tarjeta</label>
                        <select name="id_tarjeta" class="form-control">
                            <option value="{{$recorrido->tarjeta_id}}">ID {{$recorrido->tarjeta_id}}</option>
                            @foreach ($tarjetas as $tarjeta)
                                <option value="{{$tarjeta->id}}">ID {{$tarjeta->id}}</option>
                            @endforeach
                        </select>
                    </div>
                    <a href="{{route('recorridos.index')}}" class="btn btn-secondary" tabindex="3">Cancelar</a>
                    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
                </form>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   @endsection
  </body>
</html>