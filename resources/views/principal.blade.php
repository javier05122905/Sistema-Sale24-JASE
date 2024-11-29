<html>
    <head>
        <!-- Enlaces a las hojas de estilo Bootstrap -->
        <link href="{!! asset('css/sale24bootstrap.css') !!}" rel="stylesheet" />
        <link href="{!! asset('css/sale24bootstrap.min.css') !!}" rel="stylesheet" />
        @yield('estilos_adicionales')
        <!-- Scripts de Bootstrap y jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js">  </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
       
       

    </head>
    <body>
         <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
          <!-- Logo de la empresa -->
    <a class="navbar-brand" href="#">
    <img src= "{{asset('archivos/logo24.png')}}"  alt="Logo de SUPER X24">
    </a>
    <!-- Botón para mostrar el menú en dispositivos móviles -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Menú de navegación -->
    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav me-auto">
          <!-- Opción de Inicio -->
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('inicio') }}">Inicio 2
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        </li>
          <!-- Opción de Catálogos con submenú -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Catálogos</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Productos</a>
            <a class="dropdown-item" href="{{route('reporteproveedor')}}">Provedoores</a>
            <a class="dropdown-item" href="#">Empleados</a>
           
          </div>
        </li>
          <!-- Opción de Servicios con submenú -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Servicios</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="">Registrar compra</a>
            <a class="dropdown-item" href="{{ route('realizarventa') }}">Registrar venta</a>
            <a class="dropdown-item" href="#">Registrar Entrada/Salida</a>
            <div class="dropdown-divider"></div>
          </div>
        </li>
         <!-- Opción de Empleados con submenú -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Empleados</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ route('altaempleados') }}">Registrar</a>
            <a class="dropdown-item" href="#">Modificar</a>
            <a class="dropdown-item" href="#">Eliminar</a>
            <div class="dropdown-divider"></div> 
          </div>
        </li>
       
      
         <!-- Opción de contacto -->
        <li class="nav-item">
          <a class="nav-link" href="{{route('registrarsugerencias')}}">Escríbenos</a>
        </li>
      </ul>
       <!-- Formulario de búsqueda -->
      <form class="d-flex">
        <input class="form-control me-sm-2" type="search" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit" fdprocessedid="c02qnox">Search</button>
      </form>
    </div>
  </div>
</nav>

    <!-- Contenido dinámico que se insertará desde otras vistas -->
@yield('contenido')

</body>
</html>