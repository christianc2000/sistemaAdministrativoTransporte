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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Recorridos</title>
</head>

<body>
    @section('content')
        <div class="container">
            <div class="card">
                <div class="card-header"> Recorridos </div>
                <div class="card-body">
                    <div class="form-group">
                        <a href="{{route('recorridos.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i></a>
                    </div>
                    <div class="col-sm-8">
                        <h3 class="col-sm-20">Recorrido Tarjeta {{ $tarjeta_id }}</h3>
                        <div class="form-group row" style="margin-left: 5px">
                            <label for="" class="col-sm-3 col-form-label">Número de interno: </label>
                            <div class="col-sm-5">
                                <label for="" class="col-form-label" style="font-weight: normal">
                                    @foreach ($chofers as $chofer)
                                        {{ $chofer['nro_interno'] }}
                                    @endforeach
                                </label>
                            </div>
                        </div>
                    </div>
                    <table id="tarjeta" class="table table-striped mt-4" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th class="text-center">Nro. Recorrido</th>
                                <th>Hora Partida</th>
                                <th>Hora Llegada</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recorridos as $recorrido)
                                <tr>
                                    <td>{{ $recorrido->id }}</td>
                                    <td class="text-center">{{ $recorrido->nro_recorrido }}</td>
                                    <td>{{ $recorrido->hora_partida }}</td>
                                    <td>{{ $recorrido->hora_llegada }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
    @stop
</body>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

</html>
