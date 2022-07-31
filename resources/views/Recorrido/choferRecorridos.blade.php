@extends('adminlte::page')

@section('title', 'Recorridos de Tarjeta')

@section('content_header')
    <h1>Recorrido de Tarjeta {{ $choferTarjeta->tarjeta->id }} - {{ $choferTarjeta->fecha }} -
        {{ $choferTarjeta->chofer->user->nombre }} {{ $choferTarjeta->chofer->user->apellido }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            @if ($choferTarjeta->activo == true)
                <button type="button" class="btn btn-primary btn-store" data-bs-toggle="modal"
                    data-bs-target="#modalAddRecorrido">
                    <span>Añadir Recorrido</span>
                </button>
            @endif

        </div>
        <div class="card-body">
            <table id="tabla" class="table table-striped table-bordered shadow-lg mt-3" style="width:100%">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">RECORRIDO</th>
                        <th scope="col">HORA PARTIDA</th>
                        <th scope="col">HORA LLEGADA</th>
                        <th scope="col">FINALIZADO</th>
                        <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
                <TBODY>
                    @foreach ($choferTarjetaRecorridos as $ctr)
                        <tr>
                            <td>{{ $ctr->id }}</td>
                            <td>
                                @if ($ctr->recorridoTarjeta->tipo_recorrido)
                                    Vuelta
                                @else
                                    Ida
                                @endif
                            </td>
                            <td>{{ $ctr->recorridoTarjeta->hora_partida }}</td>
                            <td scope="col" style="width: 250px">{{ $ctr->recorridoTarjeta->hora_llegada }}</td>
                            <td>{{ $ctr->hora_finalizado }}</td>
                            <td>
                                @if ($choferTarjeta->activo == true)
                                    @if ($ctr->hora_finalizado == null || $ctr->hora_finalizado == '00:00:00')
                                        <button type="button" class="btn btn-primary btn-form" id="{{ $ctr }}"
                                            data-bs-toggle="modal" data-bs-target="#modalFinalizar">
                                            <span>Hora Finalizado</span>
                                        </button>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </TBODY>
            </table>
        </div>
        <div class="card-footer">
            <a href="/chofertarjetas">
                <button type="button" class="btn btn-danger">Retroceder</button>
            </a>
            @if ($choferTarjeta->activo == true)
                <form action="{{ route('admin.tarjetaFinalizar', $choferTarjeta->id) }}" method="get">
                    <button type="submit" class="btn btn-info">Finalizar Tarjeta</button>
                </form>
            @endif
        </div>
    </div>
    <!-- Modal ADD RECORRIDO-ONE -->
    <div class="modal fade" id="modalAddRecorrido" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        <p id="parrafo"></p>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.storechoferTarjetaRecorrido') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="labelAporte" class="col-sm-12 col-form-label">Tiempo Finalizado</label>
                            <input type="time" class="form-control" name="hora_finalizado" id="hora_finalizado"
                                placeholder="Hora Finalizado">
                        </div>
                        <div class="form-group row">
                            <label for="labelRecorrido" class="col-sm-12 col-form-label">Recorrido</label>
                            <select class="form-control" name="recorrido_tarjeta_id" id="recorrido_tarjeta">
                                <option value="" selected disabled>Seleccionar</option>
                                @foreach ($recorrido_tarjetas as $rt)
                                    <option value={{ $rt->id }}>
                                        @if ($rt->tipo_recorrido)
                                            Vuelta - {{ $rt->hora_partida }} - {{ $rt->hora_llegada }}
                                        @else
                                            Ida - {{ $rt->hora_partida }} - {{ $rt->hora_llegada }}
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="labelchofertarjeta" class="col-sm-12 col-form-label">Chofer Tarjeta</label>
                            <input name="chofer_tarjeta_id" type="numeric" class="form-control" id="chofer_tarjeta_id"
                                value="{{ $choferTarjeta->id }}" hidden>
                            <label for="" class="form-control" style="font-weight: normal"
                                readonly>{{ $choferTarjeta->id }}</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success"><span>Guardar</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Tiempo-finalizado -->
    <div class="modal fade" id="modalFinalizar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        <p id="parrafo"></p>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form" method="POST">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="labelHoraFinalizado" class="col-sm-12 col-form-label">Hora Finalizado</label>
                            <input type="time" class="form-control" name="hora_finalizado" id="tiempo"
                                placeholder="Tiempo Finalizado">
                        </div>
                        <div class="form-group row">
                            <label for="labelrecorrido" class="col-sm-12 col-form-label">Recorrido</label>
                            <input name="recorrido_tarjeta_id" type="numeric" class="form-control recorrido-tarjeta"
                                hidden>
                            <label for="" class="form-control" id="labelRecorridoTarjeta"
                                style="font-weight: normal"></label>
                        </div>

                        <div class="form-group row">
                            <label for="labelchofertarjeta" class="col-sm-12 col-form-label">Chofer Tarjeta</label>
                            <input name="chofer_tarjeta_id" type="numeric" class="form-control chofer-tarjeta" hidden>
                            <label for="" id="labelChoferTarjeta" class="form-control"
                                style="font-weight: normal"></label>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success"><span>Guardar</span></button>
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
    </style>


@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    {{-- cdn modal --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    {{--  --}}

    <script>
        $(document).ready(function() {
            $('#tabla').DataTable({
                "lengthMenu": [
                    [5, 10, 50, -1],
                    [5, 10, 50, "Todo"]
                ]
            });
            $(".btn-form").on('click', function() {
                ctr = $(this).attr('id');

                ctr = JSON.parse(ctr);
                console.log(ctr);
                $("#parrafo").text("Finalizar recorrido id: " + ctr['id']);

                $('#form').attr('action', "{{ url('/admin/recorrido-tarjeta') }}/" + ctr['id']);
                $(".recorrido-tarjeta").val(ctr['recorrido_tarjeta_id']);
                $("#labelRecorridoTarjeta").text(ctr['recorrido_tarjeta_id']);
                $(".chofer-tarjeta").val(ctr['chofer_tarjeta_id']);
                $("#labelChoferTarjeta").text(ctr['chofer_tarjeta_id']);
                //$("#duenio_id").val(duenio['id']);
                //$("#duenio_id_label").text(duenio['nombre'] + " " + duenio['apellido']);
            });

        });
    </script>

@stop
