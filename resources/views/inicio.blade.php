@extends('principal')

@section('contenido')
@if (Session::has('mensaje'))
          <div>
        <div class="alert alert-dismissible alert-success">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Felicidades</strong> {{ Session::get('mensaje') }}
        </div>
     </div>
      @endif
<!-- Encabezado de la página -->
    <center><h1> <B>Bienvenido a Super X24</B></h1></center>
    <!-- Imagen de anuncio centrada -->
    <center><img class="rounded" src = "{{asset('archivos/anuncio.jpg')}}" 
                 height =450 width = 600 ></center>
   
@stop