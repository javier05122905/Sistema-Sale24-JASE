@extends('principal')
@section('contenido')
        
    
<!--
    Formulario para editar proveedores.
    Este formulario permite editar los datos de un proveedor, incluyendo el nombre, dirección y logo.
    Autor: Javier Adolfo Sanchez Espinoza
    Fecha: 08/04/2024
-->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <!-- Título del formulario -->
                    <h1 class="card-title text-center">
                        Edita Proveedor
                    </h1>
                    <br>
                    <!-- Formulario de edición de proveedor -->
                    <form action="{{ route('guardacambios') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <!-- Campo oculto para el ID del proveedor a editar -->
                        <input type='hidden' name='idprov' value="{{ $infoproveedor->idprov }}">
                        <!-- Campo para el nombre del proveedor -->
                        <div class="form-group">
                            <label for="nom_prov">Nombre:</label>
                            <!-- Verificación de errores de validación -->
                            @if($errors->first('nom_prov'))
                                <p class="text-warning">{{ $errors->first('nom_prov') }}</p>
                            @endif
                            <!-- Campo de entrada de texto para el nombre del proveedor -->
                            <input type="text" class="form-control" id="nom_prov" name="nom_prov" value="{{ $infoproveedor->nom_prov }}" placeholder="Teclea el nombre (max. 50 caracteres)" maxlength="50">
                        </div>
                        <br>
                        <!-- Campo para la dirección del proveedor -->
                        <div class="form-group">
                            <label for="direccion">Dirección:</label>
                            <!-- Verificación de errores de validación -->
                            @if($errors->first('direccion'))
                                <p class="text-warning">{{ $errors->first('direccion') }}</p>
                            @endif
                            <!-- Campo de entrada de texto para la dirección del proveedor -->
                            <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $infoproveedor->direccion }}" placeholder="Ingrese la dirección (max. 100 caracteres)" maxlength="100">
                        </div>
                        <br>
                        <!-- Campo para cargar el logo del proveedor -->
                        <div class="form-group">
                            <label for="foto">Logo:</label>
                            <!-- Verificación de errores de validación -->
                            @if($errors->first('foto'))
                                <p class="text-warning">{{ $errors->first('foto') }}</p>
                            @endif
                            <!-- Mostrar el logo actual del proveedor -->
                            <a href="{{ asset('archivos/'.$infoproveedor->foto) }}" target='_blank'>
                                <img src="{{ asset('archivos/'.$infoproveedor->foto) }}" height="100" width="100">
                            </a>
                            <!-- Campo de carga de archivo para el logo del proveedor -->
                            <input type="file" name='foto' class="form-control">
                        </div>
                        <br>
                        <!-- Botón para guardar los cambios del proveedor -->
                          
                        <div class="text-center">
                        <button type="submit" class="btn btn-dark">Guardar</button>
                        <span style="margin-left: 50px;"></span> <!-- Espacio adicional entre los botones -->
                        <a href="{{ route('reporteproveedor') }}">
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