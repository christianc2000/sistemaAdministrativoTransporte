@extends('adminlte::page')

@section('title', 'CREAR CHOFER')

@section('content_header')
    <h1>Crear chofer</h1>
@stop

@section('content')
    <form action="{{ route('chofers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (count($errors) > 0)
            <div class="alert alert-danger" rote="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </ul>
            </div>

        @endif

        <div class="mb-3">
            <label for="" class="col-form-labelel">Seleccionar Micro</label>
            <div></div>
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="micro_id">
                <option value="">Indefinido</option>
                @foreach ($micros as $micro)
                    {{-- <option value="{{$user->ci}}" >{{$user}} </option> --}}

                    <option value="{{ $micro->id }}">Placa:{{ $micro->placa }} -
                        Modelo:{{ $micro->modelo }} - Línea:{{ $micro->permisoLinea->linea->nrolinea }}
                    </option>
                @endforeach
            </select>

            @error('micro_id')
                <br>
                <small>{{ $message }} </small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="" class="col-form-labelel">ci</label>
            <input id="ci" name="ci" type="text" step="any" value="" class="form-control"
                tabindex="1" required autofocus autocomplete="ci">
            @error('ci')
                <br>
                <small>{{ $message }} </small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="" class="col-form-labelel">Nombre</label>
            <input id="codigo" name="name" type="text" step="any" value="" class="form-control"
                tabindex="1" required autofocus autocomplete="codigo">
            @error('name')
                <br>
                <small>{{ $message }} </small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="col-form-labelel">Apellido</label>
            <input id="apellido" name="apellido" type="text" step="any" value="" class="form-control"
                tabindex="1" required autofocus autocomplete="apellido">
            @error('apellido')
                <br>
                <small>{{ $message }} </small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="col-form-labelel">Seleccionar sexo</label>
            <div></div>
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="sexo">
                {{-- <option selected>seleccionar sexo</option> --}}
                <option value="M">Masculino</option>
                <option value="F">femenino</option>
            </select>

            @error('sexo')
                <br>
                <small>{{ $message }} </small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="col-form-labelel">fecha de nacimiento</label>
            <input id="fecha_nac" name="fecha_nac" type="date" step="any" value="" class="form-control"
                tabindex="1" required autofocus autocomplete="fecha_nac">
            @error('fecha_nac')
                <br>
                <small>{{ $message }} </small>
            @enderror
        </div>
        <!--ERROR NOmbre-->

        <!--***************************************-->
        <div class="mb-3">
            <label for="" class="col-form-label">Telefono</label>
            <input id="telefono" name="telefono" type="number" class="form-control" tabindex="2" required autofocus
                autocomplete="telefono">
            @error('telefono')
                <br>
                <small>*{{ $message }} </small>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="" class="col-form-labelel">Correo electronico</label>
            <input id="email" name="email" type="email" step="any" value="" class="form-control"
                tabindex="1" required autofocus autocomplete="email">
            @error('email')
                <br>
                <small>{{ $message }} </small>
            @enderror
        </div>
        <div class="form-group">
            <label for="inputImagen" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-10">
                <div class="grid grid-cols-1 mt-4 mx-7">
                    <img id="imagenSeleccionada" style="max-height: 200px;">
                </div>
                <input class="form-control my-2" type="file" id="foto" name="foto" accept="image/*">
                    @error('foto')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
        </div>
        {{-- <div class="mb-3">
            <label for="" class="col-form-label">Tipo deconductor</label>
            <div></div>
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                <option selected>seleccionar</option>
                <option value="A">A</option>
                <option value="I">I</option>
            </select>
            @error('tipo')
                <br>
                <small>*{{ $message }} </small>
            @enderror
        </div> --}}
        <!--ERROR correo electronico-->

        <!--***************************************-->
        <div class="mb-3">
            <label for="" class="col-form-label">Contraseña</label>
            <input id="sueldo" name="password" type="password" step="any" class="form-control" tabindex="3"
                required autofocus autocomplete="sueldo">
            @error('password')
                <br>
                <small>*{{ $message }} </small>
            @enderror
            <!--***************************************-->
        </div>
        <!--ERROR contraseña-->

        <!--***************************************-->
        {{-- <div class="mb-3">
            <label class="control-label col-md-2 col-sm-3 col-xs-12">Lista de roles</label>
            @foreach ($roles as $role)
                <div class="form-check">
                    <input type="radio" class="op" name="rol" id="{{ $role->id }}" value="{{ $role->id }}">
                    <label for="{{ $role->id }}">{{ $role->name }} </label>
                </div>
            @endforeach
            @error('rol')
                <small>*{{ $message }} </small>
            @enderror
        </div> --}}
        <div class="mb-3">
            <label for="" class="col-form-labelel">Direccion</label>
            <input id="direccion" name="direccion" type="text" step="any" value="" class="form-control"
                tabindex="1" required autofocus autocomplete="direccion">
            @error('direccion')
                <br>
                <small>{{ $message }} </small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="col-form-labelel">Seleccionar categoria licencia</label>
            <div></div>
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="cateLicen">
                {{-- <option >seleccionar categoria</option> --}}
                <option value="A"> Categoria A</option>
                <option value="B">Categoria B</option>
                <option value="C">Categoria C</option>
            </select>

            @error('cateLicen')
                <br>
                <small>{{ $message }} </small>
            @enderror
        </div>
        <!--asignar rol-->
        <a href="{{ route('chofers.index') }}" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-outline-success" tabindex="4">Guardar</button>
    </form>
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

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function(e){
        $('#foto').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#imagenSeleccionada').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>
@stop
