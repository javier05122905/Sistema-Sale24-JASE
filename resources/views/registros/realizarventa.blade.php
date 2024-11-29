@extends('principal')
@section('contenido')


   <!-- 
    Formulario para realizar ventas.
    Este formulario permite a los usuarios seleccionar productos, ingresar la cantidad a vender y registrar la venta.
    Autor: Javier Adolfo Sanchez Espinoza
    Fecha: 08/04/2024
-->
<center>
    <h1>Realizar Venta</h1>
    <form action="{{ route('guardarVenta') }}" method="POST" >
        {{ csrf_field() }}
        <!-- Contenedor principal -->
        <div class="container">
            <!-- Fila para seleccionar empleado y fecha -->
            <div class="row">
                <!-- Columna para seleccionar empleado -->
                <div class="col-md-6">
                    <label for="empleado">Empleado:</label>
                    <select class="form-control" name="empleado" id="empleado">
                        <!-- Ciclo para mostrar opciones de empleados -->
                        @foreach($todosempleados as $empleado)
                            <option value="{{ $empleado->idem }}">{{ $empleado->nom_em }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Columna para seleccionar fecha -->
                <div class="col-md-6">
                    <label for="fecha">Fecha:</label>
                    <input type="date" class="form-control" name="fecha" id="fecha">
                </div>
            </div>
        </div>
        <!-- Contenedor de productos -->
        <div class="container">
            <div class="row">
                <!-- Ciclo para mostrar productos -->
                @foreach($todosproductos as $producto)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $producto->nom_pro }}</h5>
                                <p class="card-text">Precio: ${{ $producto->precio }}</p>
                                <p class="card-text cantidad-existente">Cantidad Existente: {{ $producto->cant }}</p>
                                <img src="{{ asset('archivos/'.$producto->foto_pro) }}" height="150" width="150">
                                <input type="number" class="form-control cantidad" name="productos[{{ $producto->idp }}]" data-cantidad="{{ $producto->cant }}" placeholder="Cantidad a vender">
                                <button type="button" class="btn btn-secondary agregar" data-id="{{ $producto->idp }}" data-nombre="{{ $producto->nom_pro }}" data-precio="{{ $producto->precio }}">Agregar</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </center>

    <!-- Tabla para mostrar detalles de la venta -->
    <table class="table">
        <thead>
            <tr>
                <th>Nombre Producto</th>
                <th>ID Producto</th>
                <th>Precio Unitario</th>
                <th>Cantidad</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody id="tabla-venta">
            <!-- Aquí se agregarán las filas dinámicamente -->
        </tbody>
    </table>
    <!-- Total de la venta -->
    <div id="total-venta">Total: $0.00</div>
    <!-- Campo oculto para el total de la venta -->
    <input type="hidden" name="totalVenta" id="total-venta-input">
    <!-- Botón para guardar la venta -->
    <div class="text-center">
        <input type='submit'  class="btn btn-dark" name = 'Guardar' value = 'Guardar'>
    </div>
    </form>
</center>

<!-- Script de JavaScript -->
<script>
    $(document).ready(function(){
        var totalVenta = 0;
        $('.agregar').on('click', function(){
            var idProducto = $(this).data('id');
            var nombreProducto = $(this).data('nombre');
            var precioProducto = parseFloat($(this).data('precio'));
            var cantidadVenta = parseInt($(this).closest('.card').find('.cantidad').val());
            var totalProducto = precioProducto * cantidadVenta;
            totalVenta += totalProducto;
            // Agregar fila a la tabla
            $('#tabla-venta').append('<tr><td>' + nombreProducto + '</td><td>' + idProducto + '</td><td>' + precioProducto.toFixed(2) + '</td><td>' + cantidadVenta + '</td><td>' + totalProducto.toFixed(2) + '</td></tr>');
            // Actualizar el total de la venta
            $('#total-venta').text('Total: $' + totalVenta.toFixed(2));
            // Desactivar el botón de agregar para este producto
            $(this).prop('disabled', true);
        });

        // Evento al hacer clic en el botón de realizar venta
        $('#btn-realizar-venta').on('click', function(){
            // Calcular el total de la venta y asignarlo al campo oculto
            var totalVentaInput = 0;
            $('#tabla-venta tbody tr').each(function(){
                totalVentaInput += parseFloat($(this).find('td:eq(4)').text());
            });
            $('#total-venta-input').val(totalVentaInput.toFixed(2));
            // Enviar el formulario
            $('#form-realizar-venta').submit();
        });
    });
</script>





@stop

