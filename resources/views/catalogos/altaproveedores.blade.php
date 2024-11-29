@extends('principal')


@section('contenido')


        

     
        
     <!-- Formulario para registrar proveedores -->
    
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h1 class="card-title text-center">
           
            Registro de Proveedores
          </h1>
          <br>
          <form action="{{ route('guardaproveedores') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }} <!-- Campo de protección contra ataques CSRF -->
       
            <div class="form-group">
            <!-- Campo para el nombre del proveedor -->
            <label for="nom_prov">Nombre:</label>
            <!-- Verificación de errores de validación -->
            @if($errors->first('nom_prov'))
            <p class="text-warning">{{ $errors->first('nom_prov') }}</p>
            @endif
            <!-- Campo de entrada de texto para el nombre del proveedor -->
            <input type="text" class="form-control" id="nom_prov" name="nom_prov" value="{{ old('nom_prov') }}" placeholder="Teclea el nombre (max. 50 caracteres) "maxlength="50">
            </div>
            <br>
            <div class="form-group">
              <!-- Campo para la dirección del proveedor -->
        <label for="direccion">Dirección:</label>
        <!-- Verificación de errores de validación -->
        @if($errors->first('direccion'))
            <p class="text-warning">{{ $errors->first('direccion') }}</p>
        @endif
        <!-- Campo de entrada de texto para la dirección del proveedor -->
        <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion') }}" placeholder="Ingrese la dirección (max. 100 caracteres)" maxlength="100">
            </div>
            <br>
            <div class="form-group">
               <!-- Campo para cargar el logo del proveedor -->
        <label for="foto">Logo:</label>
        <!-- Verificación de errores de validación -->
        @if($errors->first('foto'))
            <p class="text-warning">{{ $errors->first('foto') }}</p>
        @endif
        <!-- Campo de carga de archivo para el logo del proveedor -->
        <input type="file" class="form-control" id="foto" name="foto">
            </div>
           <br>
           
            <!-- Botón para enviar el formulario y guardar el proveedor -->
           
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
  

