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
                <form action="{{route('chofertarjetas.store')}}" method="POST">
                @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Fecha</label>
                        <input type="date" name="fecha" step="1" class="form-control" tabindex="2" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Chofer</label>
                        <select name="id_chofer" class="form-control" required>
                            <option value="" selected disabled>Seleccione Chofer</option>
                            @foreach ($choferes as $chofer)
                                <option value="{{$chofer->id}}">Chofer - {{$chofer->nombre}} {{$chofer->apellido}} - Interno {{$chofer->nro_interno}} - Linea {{$chofer->nrolinea}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="col-form-labelel">Seleccionar Estado</label>
                    <div></div>
                        <select class="form-control" name="estado">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">ID Tarjeta</label>
                        <select name="id_tarjeta" class="form-control" required>
                            <option value="" selected disabled>Seleccione ID Tarjeta</option>
                            @foreach ($tarjetas as $tarjeta)
                                <option value="<?php echo strval($tarjeta->id) ?>"><?php echo strval($tarjeta->id) ?></option>
                            @endforeach
                        </select>
                    </div>
                    <a href="/admin/chofertarjetas" class="btn btn-secondary" tabindex="3">Cancelar</a>
                    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
                </form>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    @endsection
  </body>
</html>