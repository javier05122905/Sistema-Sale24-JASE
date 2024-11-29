@extends('principal')
@section('contenido')
    <div class="ticket">
        <h2>Ticket de Venta</h2>
        <p><strong>Clave del empleado:</strong> {{ $ventas->idem }}</p>
        <p><strong>Fecha:</strong> {{ $ventas->fecha }}</p>
        <p><strong>Producto:</strong> {{  $detalle_de_ventas->idp }}</p>
        <p><strong>Cantidad:</strong> {{  $detalle_de_ventas->canti }}</p>
        <p><strong>Precio Unitario:</strong> ${{  $detalle_de_ventas->precio }}</p>
        <p><strong>Total:</strong> ${{ $ventas->total }}</p>
        
    </div>
@stop