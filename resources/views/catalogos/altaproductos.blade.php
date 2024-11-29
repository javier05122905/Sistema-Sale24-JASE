@extends('principal')

@section('contenido')
    <center><h1>Registro de productos</h1>
   <form action="{{route('guardaproductos')}}" method = "POST">
    {{ csrf_field ()}}
    <table border = 1>
    <tr>
        <td align = 'right'>Nombre del producto:</td>
        <td>
      
            <input type='text' class = "form-control" name ='nom_pro' value="{{old('nom_pro')}}" placeholder ='Teclea el nombre'>
        </td>
    </tr>
    <tr>
        <td align ='right'>Precio:</td>
        <td>
            <input type='text' class = "form-control" name ='precio' value="{{old('precio')}}" placeholder = 'Digite el precio'>
        </td>
  
    </tr>
    <tr>
        <td align ='right'>Cantidad:</td>
        <td>
            <input type='text' class = "form-control" name ='cant' value="{{old('cant')}}" placeholder = 'Digite la cantidad'>
        </td>
    </tr>
    <br>
    <tr>
        <td align= 'right' colspan = 2>
        <input type='submit'  class="btn btn-dark" name = 'Guardar' value = 'Guardar'>
        </td>
       
    </tr>
   
        </table>
    
        </form></center>
@stop