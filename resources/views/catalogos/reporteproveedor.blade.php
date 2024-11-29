@extends('principal')

@section('contenido')
    <!-- Encabezado de la página -->
    <h1 class="card-title text-center">
           
           Catálogo de Proveedores
         </h1>

    <!-- Botón para dar de alta un nuevo proveedor -->
    <a href="{{ route('altaproveedores') }}">
        <button type="button" class="btn btn-secondary">Alta de Proveedor</button>
    </a>

    @if (Session::has('mensaje'))
          <div>
        <div class="alert alert-dismissible alert-success">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Felicidades</strong> {{ Session::get('mensaje') }}
        </div>
     </div>
      @endif

      @if (Session::has('error'))
          <div>
        <div class="alert alert-dismissible alert-danger">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Error</strong> {{ Session::get('error') }}
        </div>
     </div>
      @endif

    <!-- Tabla para mostrar la lista de proveedores -->
    <table class="table table-default" border=1>
        <tr>
            <td>Logo</td>
            <td>Clave</td>
            <td>Nombre</td>
            <td>Dirección</td>
            <td>Opciones</td>
        </tr>
        <!-- Iteración sobre los datos de consulta para mostrar cada proveedor -->
        @foreach($consulta as $c)
            <tr>
                <td><img src="{{ asset('archivos/'.$c->foto) }}" height="100" width="100"></td>
                <td>{{ $c->idprov }}</td>
                <td>{{ $c->nom_prov }}</td>
                <td>{{ $c->direccion }}</td>
                <td>
                    <!-- Enlace para editar el proveedor -->
                    <a href="{{ route('editaproveedor', ['idprov' => $c->idprov]) }}">
                        <button type="button" class="btn btn-secondary">Editar</button>
                    </a>
                    <!-- Enlace para eliminar el proveedor -->
                    <a href="{{ route('eliminaproveedor', ['idprov' => $c->idprov]) }}">
                        <button type="button" class="btn btn-danger">Eliminar</button>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
@stop


