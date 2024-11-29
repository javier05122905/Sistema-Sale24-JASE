@extends('principal')

@section('contenido')
    <center><h1>Registro de empleados</h1>
   <form action="{{route('guardaempleados')}}" method = "POST">
    {{ csrf_field ()}}
    <table border = 1>
    <tr>
        <td align = 'right'>Id del empleado:</td>
        <td>
       
            <input type='text' class = "form-control" name ='idem' value="{{old('idem')}}" placeholder ='Teclea el id'>
        </td>
    </tr>
    <tr>
        <td align = 'right'>Nombre del empleado:</td>
        <td>
      
            <input type='text' class = "form-control" name ='nom_em' value="{{old('nom_em')}}" placeholder ='Teclea el nombre'>
        </td>
    </tr>
    <tr>
        <td align ='right'>Cargo:</td>
        <td>
            <input type='text' class = "form-control" name ='cargo' value="{{old('cargo')}}" placeholder = 'Ingrese el puesto'>
        </td>
  
    </tr>
    <tr>
        <td align ='right'>Telefono:</td>
        <td>
            <input type='text' class = "form-control" name ='tel_em' value="{{old('tel_em')}}" placeholder = 'Digite el numero'>
        </td>
    </tr>
    <tr>
        <td align ='right'>Salario:</td>
        <td>
            <input type='text' class = "form-control" name ='salario' value="{{old('salario')}}" placeholder = 'Digite la cantidad'>
        </td>
    </tr>
    <tr>
        <td align ='right'>Fecha de contratacion:</td>
        <td>
      
        <input type='date' class="form-control" name='fecha_contrato' value="{{old('fecha_contrato')}}"></td>
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