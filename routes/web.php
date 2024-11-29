<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tiendacontroller;


/**
 * Archivo de rutas de la aplicación.
 *
 * Este archivo contiene las definiciones de las rutas para diferentes funciones
 * de la aplicación, incluyendo la gestión de productos, proveedores, ventas, 
 * sugerencias, empleados y la página de inicio.
 *
 * @author Javier Adolfo Sanchez Espinoza
 * 08/04/2024
 */
// Rutas para la gestión de productos

Route::get('altaproductos',[tiendacontroller::class,'altaproductos'])->name('altaproductos');
Route::post('guardaproductos',[tiendacontroller::class,'guardaproductos'])->name('guardaproductos');



// Rutas para la gestión de proveedores
Route::get('altaproveedores',[tiendacontroller::class,'altaproveedores'])->name('altaproveedores');
Route::post('guardaproveedores',[tiendacontroller::class,'guardaproveedores'])->name('guardaproveedores');
Route::get('reporteproveedor',[tiendacontroller::class,'reporteproveedor'])->name('reporteproveedor');
Route::get('editaproveedor/{idprov}',[tiendacontroller::class,'editaproveedor'])->name('editaproveedor');
Route::POST('guardacambios',[tiendacontroller::class,'guardacambios'])->name('guardacambios');
Route::get('eliminaproveedor/{idprov}',[tiendacontroller::class,'eliminaproveedor'])->name('eliminaproveedor');

// Rutas para la gestión de ventas
Route::get('realizarventa',[tiendacontroller::class,'realizarventa'])->name('realizarventa');
Route::POST('guardarVenta',[tiendacontroller::class,'guardarVenta'])->name('guardarVenta');
Route::get('mostrarticket',[tiendacontroller::class,'mostrarticket'])->name('mostrarticket');


//Rutas para el registro de sugerencias
Route::get('registrarsugerencias',[tiendacontroller::class,'registrarsugerencias'])->name('registrarsugerencias');
Route::POST('guardarsugerencias',[tiendacontroller::class,'guardarsugerencias'])->name('guardarsugerencias');




// Rutas para la gestión de empleados
Route::get('altaempleados',[tiendacontroller::class,'altaempleados'])->name('altaempleados');
Route::post('guardaempleados',[tiendacontroller::class,'guardaempleados'])->name('guardaempleados');

// Ruta para la página de inicio
Route::get('inicio',[tiendacontroller::class,'inicio'])->name('inicio');