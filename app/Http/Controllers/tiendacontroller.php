<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\proveedores;
use App\Models\productos;
use App\Models\empleados;
use App\Models\ventas;
use App\Models\detalle_de_ventas;
use App\Models\clientes;
use App\Models\sugerencias;
use Session;

/**
 * Controlador para la gestión de la tienda.
 *
 * Este controlador maneja las acciones relacionadas con la gestión de la tienda, 
 * incluyendo la alta de productos y proveedores, la realización de ventas, el registro de sugerencias, 
 * la gestión de empleados y la página de inicio.
 *
 * @author Javier Adolfo Sanchez Espinoza
 * 08/04/2024
 */

class tiendacontroller extends Controller
{
     /**
     * Muestra la vista para el formulario de alta de productos.
     */
    public function altaproductos()
    {
        return view ('catalogos.altaproductos');
    }
    /**
     * Guarda los datos del formulario de alta de productos.
     */
    public function guardaproductos(request $request)
    {
        return $request;
        $this->validate($request,[
            'nom_pro'=>'required'
        ]) ;
    }


    public function altaproveedores()
    {
        // Retorna la vista para el formulario de alta de proveedores
        return view ('catalogos.altaproveedores');
       
    }

  
 /**
     * Guarda los datos del formulario de alta de proveedores.
     */
    public function guardaproveedores(Request $request)
    {
        // Validar los datos del formulario
        $this->validate($request,[
            
            'nom_prov' => 'required|regex:/^[A-Za-z\s,.&]+$/',
            'direccion' => 'required|regex:/^[A-Z0-9][A-Za-zÁÉÍÓÚÜÑáéíóúüñ0-9\s,.&\-#]+$/',

            'foto'=>'mimes:jpg,png,gif,jpeg',
           
        ]) ;
        // Manejar la carga de la imagen del proveedor
        $file = $request->file('foto');
        if($file != '')
        {
        $fecha = date_create();
        $img = date_timestamp_get($fecha) . $file->getClientOriginalName();
        \Storage::disk('local')->put($img,\File::get($file));
        }
        else
        {
        $img ='sinlogo.jpg';
        }
         // Insertar los datos del proveedor en la base de datos
        $insertaproveedor =  \DB::insert("INSERT INTO proveedores
    (nom_prov,direccion,created_at,updated_at,foto)
    VALUE ('$request->nom_prov','$request->direccion',now(),now(),'$img')");   
    Session::flash('mensaje', "El proveedor  $request->nom_prov se ha guardado correctamente");             
      // Redirigir a la página de reporte de proveedores
    return redirect()->route('reporteproveedor');
    }
  /**
     * Muestra el reporte de proveedores.
     */
    public function reporteproveedor()
    {
        // Consulta a la base de datos para obtener el reporte de proveedores
        $consulta  = \DB::select("SELECT p.idprov,p.nom_prov,p.direccion,foto
        FROM proveedores  AS p
        order by idprov asc");
        // Retorna la vista con el reporte de proveedores
        return view('catalogos.reporteproveedor')
                ->with('consulta',$consulta);
 
    }
                /**
     * Muestra el formulario para editar un proveedor.
   
     */
    public function editaproveedor($idprov)
    {
          // Consulta a la base de datos para obtener la información del proveedor
        $infoproveedor = \DB::select("SELECT p.foto,p.idprov,p.nom_prov,p.direccion
        FROM proveedores AS p
        WHERE idprov = $idprov");
        // Retorna la vista para editar el proveedor
        return view('catalogos.editaproveedor')
                ->with('infoproveedor',$infoproveedor[0]);
    }
      /**
     * Guarda los cambios realizados en un proveedor.
     */
    public function guardacambios(request $request)
    {
       
        $this->validate($request,[
     
            'nom_prov' => 'required|regex:/^[A-Za-z\s,.&]+$/',
            'direccion' => 'required|regex:/^[A-Z0-9][A-Za-zÁÉÍÓÚÜÑáéíóúüñ0-9\s,.&\-#]+$/',
            'foto'=>'mimes:jpg,jpeg,png',
           
        ]) ;
        // Manejar la carga de la imagen del proveedor
        $file = $request->file('foto');
        if($file != '')
        {
        $fecha = date_create();
        $img = date_timestamp_get($fecha) . $file->getClientOriginalName();
        \Storage::disk('local')->put($img,\File::get($file));
        }
        // Actualizar los datos del proveedor en la base de datos
        $proveedores =  proveedores::find($request->idprov);
      
        $proveedores->nom_prov = $request->nom_prov;
        $proveedores->direccion =$request->direccion;
        if($file != '')
        {
        $proveedores->foto = $request->foto = $img;
        }
        $proveedores->save();
        Session::flash('mensaje', "La información del proveedor  $request->nom_prov se ha editado correctamente");
        // Redirigir a la página de reporte de proveedores
        return redirect()->route('reporteproveedor');
    }
    /**
     * Elimina los datos de un proveedor.
     */


     public function eliminaproveedor($idprov)
     {
         try {
             // Intenta eliminar el proveedor
             \DB::table('proveedores')->where('idprov', $idprov)->delete();
             
             // Si se eliminó correctamente, mostrar mensaje de éxito
             Session::flash('mensaje', "El proveedor de clave $idprov ha sido eliminado exitosamente");
         } catch (QueryException $e) {
             // Si se produce una excepción de integridad referencial, mostrar mensaje de error
             Session::flash('error', "El proveedor de clave $idprov no se puede eliminar");
         }
         
         // Redirigir a la página de reporte de proveedores
         return redirect()->route('reporteproveedor');
     }
     /**
     * Muestra la vista para realizar una venta.
     */
    public function realizarventa ()
    {
        // Obtener todos los empleados y productos para mostrar en la vista
        $todosempleados = empleados::orderby('nom_em','desc')->get();
        $todosproductos = productos::orderby('nom_pro','desc')->get();
       
        // Retorna la vista para realizar una venta con la lista de empleados y productos
        return view('registros.realizarventa')
            ->with('todosempleados',$todosempleados)
            ->with('todosproductos',$todosproductos);
    }
    
        public function guardarVenta(Request $request)
        {
            // Validar los datos del formulario
            $request->validate([
                'empleado' => 'required',
                'fecha' => 'required',
                'productos' => 'required|array|min:1',
            ]);
    
            // Iniciar una transacción de base de datos
            \DB::beginTransaction();
    
            try {
                // Insertar datos en la tabla ventas
                $venta = new Ventas();
                $venta->idem = $request->empleado;
                $venta->fecha = $request->fecha;
                // Calcular el total de la venta
                $totalVenta = 0;
                foreach ($request->productos as $idProducto => $cantidad) {
                    $producto = Productos::find($idProducto);
                    $totalVenta += $producto->precio * $cantidad;
                }
                $venta->total = $totalVenta;
                $venta->save();
    
                // Insertar datos en la tabla detalle_de_ventas
                foreach ($request->productos as $idProducto => $cantidad) {
                    $detalleVenta = new DetalleDeVentas();
                    $detalleVenta->idv = $venta->idve;
                    $detalleVenta->idp = $idProducto;
                    $detalleVenta->canti = $cantidad;
                    $producto = Productos::find($idProducto);
                    $detalleVenta->precio = $producto->precio;
                    $detalleVenta->save();
    
                    // Actualizar la cantidad disponible del producto
                    $producto->cant -= $cantidad;
                    $producto->save();
                }
    
                // Commit de la transacción si todas las operaciones fueron exitosas
                \DB::commit();
    
                return redirect()->back()->with('success', 'Venta realizada correctamente.');
            } catch (\Exception $e) {
                // Rollback de la transacción en caso de error
                \DB::rollback();
                return redirect()->back()->with('error', 'Error al realizar la venta: ' . $e->getMessage());
            }
        }
    
    
 


    /**
     * Muestra el formulario para dar de alta un empleado.
     */
    public function altaempleados()
    {
        return view('catalogos.altaempleados'); // Retorna la vista para dar de alta un empleado
    }

    /**
     * Muestra el formulario para registrar sugerencias.
     */
    public function registrarsugerencias()
    {
        return view('registros.registrarsugerencias'); // Retorna la vista para registrar sugerencias
    }

    /**
     * Guarda los datos de la sugerencia.
     */
    public function guardarsugerencias(request $request)
    {
        // Validar los datos del formulario
        $this->validate($request,[
            'nom'=>'required|regex:/^[A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
            'telefono'=> 'required|regex:/^[0-9]{10}$/',
            'sugerencia'=> 'required',   
        ]) ;

        

        // Crear un nuevo cliente
        $clientes = new clientes();
        $clientes->nom = $request->nom;
        $clientes->telefono = $request->telefono;
        $clientes->save();

        // Crear una nueva sugerencia asociada al cliente
        $sugerencias = new sugerencias();
        $sugerencias->idcl = $clientes->idcl;
        $sugerencias->sugerencia = $request->sugerencia;
        $sugerencias->save();

        // Redirigir a la página de inicio
        Session::flash('mensaje', "La sugerencia se ha guardado correctamente");
        return redirect()->route('inicio');
    }

    /**
     * Muestra la página de inicio.
     */
    public function inicio ()
    {
        return view('inicio'); // Retorna la vista de la página de inicio
    }
}

