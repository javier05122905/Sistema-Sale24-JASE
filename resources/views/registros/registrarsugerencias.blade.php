@extends('principal')
@section('contenido')


<!-- 
    Formulario para registro de sugerencias de clientes.
    Este formulario permite a los usuarios registrar sus sugerencias, quejas o comentarios.
    Autor: Javier Adolfo Sanchez Espinoza
    Fecha: 08/04/2024
-->

<!-- Contenedor principal -->
<div class="container mt-5">
    <!-- Fila para centrar contenido -->
    <div class="row justify-content-center">
        <!-- Columna con tamaño medio -->
        <div class="col-md-6">
            <!-- Tarjeta para el formulario -->
            <div class="card">
                <div class="card-body">
                    <!-- Título del formulario -->
                    <h1 class="card-title text-center">Registro de Sugerencias</h1>
                    <!-- Formulario -->
                    <form action="{{route('guardarsugerencias')}}" method="POST">
                        <!-- Campo de protección contra ataques CSRF -->
                        {{ csrf_field() }}

                        <!-- Campo para el nombre del cliente -->
                        <div class="form-group">
                            <label for="nom_prov">Nombre:</label>
                            <!-- Verificación de errores de validación -->
                            @if($errors->first('nom'))
                            <p class="text-warning">{{$errors->first('nom')}}</p>
                            @endif
                            <!-- Input para ingresar el nombre -->
                            <input type="text" class="form-control" name="nom" id="nom" value="{{ old('nom') }}" placeholder="Nombre completo (max. 50 caracteres)" maxlength="50">
                        </div>

                        <!-- Campo para el teléfono del cliente -->
                        <div class="form-group">
                            <label for="direccion">Telefono:</label>
                            <!-- Verificación de errores de validación -->
                            @if($errors->first('telefono'))
                            <p class="text-warning">{{$errors->first('telefono')}}</p>
                            @endif
                            <!-- Input para ingresar el teléfono -->
                            <input type="text" class="form-control" name="telefono" id="telefono" value="{{ old('telefono') }}" placeholder="Ingrese su Telefono" maxlength="10">
                        </div>

                        <!-- Campo para la sugerencia del cliente -->
                        <div class="form-group">
                            <label for="direccion">Sugerencia:</label>
                            <!-- Verificación de errores de validación -->
                            @if($errors->first('sugerencia'))
                            <p class="text-warning">{{$errors->first('sugerencia')}}</p>
                            @endif
                            <!-- Textarea para ingresar la sugerencia -->
                            <textarea class="form-control" name="sugerencia" value="{{ old('sugerencia') }}" placeholder="Queja/Sugerencia (máximo 200 caracteres)" maxlength="200"></textarea>
                        </div>

                        <!-- Botón para enviar el formulario -->
                        <div class="text-center">
                        <button type="submit" class="btn btn-dark" id="boton-guardar">Guardar</button>
                        <span style="margin-left: 50px;"></span> <!-- Espacio adicional entre los botones -->
                        <a href="{{ route('inicio') }}">
                        <button type="button" class="btn btn-secondary">Cancelar</button>
              </a>
            </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Escuchar el evento submit del formulario
        $('form').submit(function() {
            // Deshabilitar el botón de guardar
            $('#boton-guardar').prop('disabled', true);
            // Evitar el envío múltiple del formulario
            $(this).submit(function() {
                return false;
            });
            return true;
        });
    });
</script>