@extends('adminlte::page')

@section('title', 'Línea')

@section('content_header')
    <h1>EDITAR LÍNEA</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('admin.linea.update', $linea->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="inputLínea" class="col-sm-2 col-form-label">Línea</label>
                    <div class="col-sm-10">
                        <input name="nrolinea" type="number" value="{{ $linea->nrolinea }}" min="0"
                            class="form-control" id="nroLinea" placeholder="Número de línea">
                        @error('nrolinea')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                @php
                    $user = Auth::user();
                @endphp
                @if ($user->tipo == 'A')
                    <div class="form-group row">
                        <label for="inputInstitucion" class="col-sm-2 col-form-label">Institucion</label>
                        <div class="col-sm-10">
                            <select class="form-control my-2" aria-label="Default select example" id="institucion_id"
                                name="institucion_id" value="{{ $linea->institucion_id }}">
                                <option value="" disabled>Seleccionar</option>
                                @foreach ($institucions as $institucion)
                                    <option value="{{ $institucion->id }}">
                                        {{ $institucion->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('institucion_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    {{-- Si el usuario es administrador podrá seleccionar a que admin de institución le pertenecerá la línea --}}
                    @foreach ($institucions as $institucion)
                        <div class="form-group row adminins" id="{{ 'ai' . $institucion->id }}"
                            name="{{ collect($adminInstitucions->where('institucion_id', $institucion->id))->values() }}"
                            style="background: #8DEEFF" hidden>
                            <label for="inputAdminIns" class="col-sm-2 col-form-label">Admin institución</label>
                            <div class="col-sm-10">

                                <select class="form-control my-2 selectAI" aria-label="Default select example"
                                    name='administrador_institucion_id[]'
                                    id="{{ 'administrador_institucion_id' . $institucion->id }}">
                                    <option value="" name="{{ 'instituciondefault' . $institucion->id }}"
                                        class="instituciondefault" disabled>Seleccionar</option>
                                </select>
                                @error('administrador_institucion_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    @endforeach
                    {{-- <button id="btn-select" type="button" class="btn btn-danger">value select</button> --}}
                @elseif ($user->tipo == 'I')
                    @php
                        $adminInstitucionUser = $user->administradorInstitucion;
                    @endphp
                    <div class="form-group row">
                        <label for="inputInstitucion" class="col-sm-2 col-form-label">Institución</label>
                        <div class="col-sm-10">

                            <input name="institucion_id" type="text" class="form-control" id="institución_id"
                                value="{{ $adminInstitucionUser->institucion->id }}" hidden>
                            <label for="inputInstitucion" class="form-control"
                                style="font-weight: normal;">{{ $adminInstitucionUser->institucion->nombre }}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputAdministradorInstitucion" class="col-sm-2 col-form-label">Admin Institucion</label>
                        <div class="col-sm-10">
                            <input name="institucion_id" type="text" class="form-control" id="institución_id"
                                value="{{ $adminInstitucionUser->id }}" hidden>
                            <label for="inputInstitucion" class="form-control"
                                style="font-weight: normal;">{{ $user->nombre }} - {{ $user->ci }}</label>
                        </div>
                    </div>
                @endif

                <div class="form-group row">
                    <label for="inputImagen" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                        <img src="{{ asset($linea->foto) }}" alt="sin-foto" width="200" height="200" id="image"
                            class="enmarcar">
                        <input class="form-control my-2" type="file" id="foto" name="foto" accept="image/*">
                        @error('foto')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputSede" class="col-sm-2 col-form-label">Dirección Sede</label>
                    <div class="col-sm-10">
                        <input name="sede" type="text" class="form-control" id="sede"
                            value="{{ $linea->sede }}" placeholder="Dirección de la sede de la línea">
                        @error('sede')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputTelefono" class="col-sm-2 col-form-label">Teléfono</label>
                    <div class="col-sm-10">
                        <input name="telefono" type="number" value="{{ $linea->telefono }}" class="form-control"
                            id="telefono" placeholder="Teléfono">
                        @error('telefono')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success">Guardar</button>
            </form>
            <a href="{{ route('admin.linea.index') }}" class="btn btn-danger">Cancelar</a>
        </div>

    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <style>
        .enmarcar {
            position: relative;
            border: 3px solid #acacac;
            border-radius: 4%;
        }
    </style>
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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
            });
        });
        $(document).ready(function() {
            select = [];
            //funcion para solo seleccionar un sólo elemento del select multiple o con vector
            /*       $('#btn-select').on('click', function() {
                       //  alert(select);
                       $('.selectAI').each(function() {
                           idSelect = $(this).attr('id');
                           if (idSelect != "administrador_institucion_id" + select[select.length - 1]) {
                               $(this).val("");
                           }
                       })

                   });*/


            //mostrar el primero seleccionado antes de actualizar
            id = $("#institucion_id").val();
            $("#ai" + id).prop('hidden', false);
            select.push(id);
            $('.selectAI').each(function() {
                idSelect = $(this).attr('id');
                if (idSelect != "administrador_institucion_id" + select[select.length - 1]) {
                    $(this).val("");
                }
            })

            //llenado de los administrador_institucion de cada institucion
            $(".adminins").each(function() {
                //adminInst = $(this).children(":selected").attr("name");
                adminInst = $(this).attr("name");
                vid = $(this).attr("id");
                id = vid.substring(2, vid.length);
                admin = JSON.parse(adminInst);
                for (let index = 0; index < admin.length; index++) {
                    const element = admin[index];
                    nombre = element['nombre'] + " - " + element['ci']
                    //console.log(element['nombre']);
                    //console.log(index+1);
                    /*let option = $('<option/>', {
                        text: nombre,
                        value: element['id'],
                    });*/
                    let option = '<option value=' + element['id'] +
                        '{{ (string) $linea->administrador_institucion_id == "'+element['id']+'" ? 'selected' : '' }}>' +
                        nombre + '</option>';

                    //   console.log(option);
                    $('#administrador_institucion_id' + id).append(option);
                    //$('select[name=administrador_institucion_id'+id+']').append(option);
                }
            });

            //cuando cambia
            $("#institucion_id").change(function() {
                vid = $(this).children(":selected").val();
                if (select.length > 0) {
                    // oculta todas las tablas al momento de cambiar de option seleccionado            
                    while (0 < select.length) {

                        // $("#administrador_institucion_id"+select[select.length-1]).value("");

                        //$('select option[name=instituciondefault'+select[select.length-1]+']').prop("disabled", false);
                        $('#administrador_institucion_id' + select[select.length - 1]).val("");
                        $("#ai" + select[select.length - 1]).prop('hidden', true);
                        select.pop();
                    }
                }
                if (vid > 0) {
                    //todo lo que tiene que ver con un sector y las areas creadas para ese sector
                    $("#ai" + vid).prop('hidden', false);
                    select.push(vid);
                }
            });
            //cambiar imagen
            document.getElementById('foto').addEventListener('change', cambiarImagen);

            function cambiarImagen(event) {
                var file = event.target.files[0];
                var reader = new FileReader();
                reader.onload = (event) => {
                    document.getElementById('image').setAttribute('src', event.target.result);

                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@stop
