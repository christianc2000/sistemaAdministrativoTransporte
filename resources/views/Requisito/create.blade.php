@extends('adminlte::page')
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Requisitos</title>
  </head>
  <body>
  @section('content')
    <div class="container">
       <div class="card">
            <div class="card-header"> Requisitos </div>
            <div class="card-body">
                <h2>Crear Registro</h2>
                <form action="/requisitos" method="POST">
                @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Nombre</label>
                        <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre del requisito..." tabindex="1" required>
                    </div>
<!--                    <div class="mb-3">
                        <label for="" class="form-label">ID Linea</label>
                        <input id="linea_id" name="linea_id" type="number" class="form-control" tabindex="2" required>
                    </div> -->
                    <div class="mb-3">
                        <label for="" class="form-label">ID Linea</label>
                        <select name="linea_id" class="form-control">
                            <option value="" selected disabled>Seleccione ID Linea</option>
                            @foreach ($lineas as $linea)
                                <option value="{{$linea->id}}">ID {{$linea->id}}</option>
                            @endforeach
                        </select>
                    </div>
                    <a href="/requisitos" class="btn btn-secondary" tabindex="3">Cancelar</a>
                    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
                </form>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  @endsection 
  </body>
</html>