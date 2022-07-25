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
                <h2>Editar Registro</h2>
                <form action="/requisitos/{{$requisito->id}}" method="POST">
                @csrf
                @method('PUT')
                    <div class="mb-3">
                        <label for="" class="form-label">Nombre</label>
                        <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre del requisito..." value="{{$requisito->nombre}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nro. Linea</label>
                        <select name="linea_id" class="form-control">
                            @foreach($nrolinea as $nro)
                              <option value="{{$nro->id}}" selected>Linea {{$nro->nrolinea}}</option>
                            @endforeach
                            @foreach ($lineas as $linea)
                                <option value="{{$linea->id}}">Linea {{$linea->nrolinea}}</option>
                            @endforeach
                        </select>
                    </div>
                    <a href="/requisitos" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   @endsection
  </body>
</html>