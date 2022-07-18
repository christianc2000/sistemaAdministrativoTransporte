@extends('adminlte::page')
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Chofer Tarjeta</title>
  </head>
  <body>
  @section('content')
    <div class="container">
       <div class="card">
            <div class="card-header"> Chofer Tarjeta </div>
            <div class="card-body">
                <h2>Crear Registro</h2>
                <form action="/chofertarjetas" method="POST">
                @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Fecha</label>
                        <input type="date" name="fecha" step="1" class="form-control" tabindex="2" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Numero de interno</label>
                        <select name="nro_interno" class="form-control">
                            <option value="">Seleccione Nro. Interno</option>
                            @foreach ($micros as $micro)
                                <option value="{{$micro->nro_interno}}">Interno {{$micro->nro_interno}}</option>
                            @endforeach
                        </select>
                    </div>
 <!--                   <div class="mb-3">
                        <label for="" class="form-label">ID Tarjeta</label>
                        <input id="nro" name="id_tarjeta" type="number" class="form-control" placeholder="ID de la tarjeta..." tabindex="4" required>
                    </div> -->
                    <div class="mb-3">
                        <label for="" class="form-label">ID Chofer</label>
                        <select name="id_chofer" class="form-control">
                            <option value="">Seleccione ID Chofer</option>
                            @foreach ($choferes as $chofer)
                                <option value="{{$chofer->id}}">ID {{$chofer->id}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">ID Tarjeta</label>
                        <select name="id_tarjeta" class="form-control">
                            <option value="">Seleccione ID Tarjeta</option>
                            @foreach ($tarjetas as $tarjeta)
                                <option value="{{$tarjeta->id}}">ID {{$tarjeta->id}}</option>
                            @endforeach
                        </select>
                    </div>
                    <a href="/chofertarjetas" class="btn btn-secondary" tabindex="3">Cancelar</a>
                    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
                </form>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    @endsection
  </body>
</html>