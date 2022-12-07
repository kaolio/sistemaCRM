<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ClonesController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\OrdenTrabajoController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\DetalleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginClienteController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\FacturacionController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ServicioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

//HOME
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/home/datosDashboard',[HomeController::class, 'datosDashboard']);
Route::get('/home/urgente',[HomeController::class, 'urgente']);
Route::get('/home/completo',[HomeController::class, 'completo']);
Route::get('/home/pagado',[HomeController::class, 'pagado']);
Route::get('/home/pendiente',[HomeController::class, 'pendiente']);

//LOGIN CLIENTE
Route::get('/login/cliente', [LoginClienteController::class, 'index']);
Route::get('/login/cliente/{id}', [LoginClienteController::class, 'vistaCliente']);
Route::post('/login/cliente', [LoginClienteController::class, 'start']);

//ROLES
Route::get('/roles',[RolesController::class,'index']);
Route::get('/roles',[RolesController::class,'index']);
Route::get('/roles/nuevo',[RolesController::class,'create']);
Route::post('/roles/nuevo',[RolesController::class,'store']);
Route::get('/roles/editar/{id}',[RolesController::class,'edit']);
Route::patch('/roles/nuevo/{id}',[RolesController::class,'update']);
Route::delete('/roles/{id}',[RolesController::class,'destroy']);

//USUARIOS
Route::get('/usuarios',[UsuarioController::class,'index']);
Route::get('/usuario/nuevo',[UsuarioController::class,'create']);
Route::post('/usuario/nuevo',[UsuarioController::class,'store']);
Route::get('/usuario/editar/{id}',[UsuarioController::class,'edit']);
Route::post('/usuario/editar/{id}',[UsuarioController::class,'update']);
//Route::post('/imagen/validar' ,[UsuarioController::class,'validar']);
Route::delete('/usuario/{id}',[UsuarioController::class,'destroy']);
//Edicion foto
Route::post('/usuario/foto', [UsuarioController::class,'updatePhoto']);

//script
Route::post('/usuario/nuevo/validarCorreo', [UsuarioController::class,'validarCorreo']);
 
//ORDEN DE TRABAJO
Route::get('/trabajos',[OrdenTrabajoController::class,'index']);
Route::delete('/trabajo/{id}',[OrdenTrabajoController::class,'destroy']);
Route::get('/trabajo/nuevo',[OrdenTrabajoController::class,'create'])->name('orden');
Route::post('/trabajo/nuevo',[OrdenTrabajoController::class,'store']);
Route::post('/trabajo/prioridad',[OrdenTrabajoController::class,'prioridad']);
Route::post('/trabajo/estado',[OrdenTrabajoController::class,'estado']);
Route::post('/trabajo/ingeniero',[OrdenTrabajoController::class,'ingeniero']);
Route::get('/trabajo/buscador',[OrdenTrabajoController::class,'buscador']);
Route::post('/trabajo/ver',[OrdenTrabajoController::class,'ver']);
Route::post('/trabajo/redireccionar',[OrdenTrabajoController::class,'redireccionar']);
Route::post('/trabajo/tiempoReal',[OrdenTrabajoController::class,'buscaTiempoReal']);
Route::post('/trabajo/cambioPrioridad',[OrdenTrabajoController::class,'cambioPrioridadNueva']);
Route::post('/trabajo/cambioEstado',[OrdenTrabajoController::class,'cambioEstadoNuevo']);
Route::post('/trabajo/eliminarVarios',[OrdenTrabajoController::class,'eliminarVarios']);
Route::post('/trabajo/imprimir',[OrdenTrabajoController::class,'variosPDF']);
Route::get('/trabajo/pdf',[OrdenTrabajoController::class,'descargarPDF']); //ruta para descargar pdf
Route::get('/trabajo/excel',[OrdenTrabajoController::class,'descargarExcel']); //ruta para descargar excel
Route::get('/trabajo/imprimirIndex',[OrdenTrabajoController::class,'imprimirPDF']); //imprimir pdf
Route::post('/trabajo/imprimirOrden',[OrdenTrabajoController::class,'imprimirOrden']); //imprimir orden especifica

Route::post('/autocompletarCliente',[OrdenTrabajoController::class,'autoCompletar']);
Route::get('/trabajo/general',[OrdenTrabajoController::class,'general']);

//Detalle de trabajo
//general

Route::post('/trabajos/nuevo/detalle/servicio',[ServicioController::class,'guardarTabla']);
Route::post('/trabajos/nuevo/detalle/guardarServicio',[ServicioController::class,'guardar']);
Route::post('/trabajos/nuevo/detalle/enviarServicio',[ServicioController::class,'enviar']);
Route::delete('/detalleServicio/{id}',[ServicioController::class,'destroy']);

Route::get('/trabajos/detalle/{id}',[DetalleController::class,'buscar']);
Route::post('/trabajos/detalle',[DetalleController::class,'buscarOrden']); //ruta buscador de orden trabajo
Route::post('/trabajos/detalle/guardarDesignado',[DetalleController::class,'guardarDesignacion']); //ruta para guardar usuario desigando
Route::post('/trabajos/detalle/guardarEstado',[DetalleController::class,'guardarEstado']); //ruta para guardar estado
Route::post('/trabajos/detalle/guardarPrioridad',[DetalleController::class,'guardarPrioridad']); //ruta para guardar prioridad
Route::post('/trabajos/detalle/NotaCliente',[DetalleController::class,'guardarNotaCliente']); //guardar nota de cliente
Route::post('/trabajos/detalle/nota',[DetalleController::class,'guardarNota']); //guardar comentario
Route::post('/trabajos/nuevo/detalle/datosTabla',[DetalleController::class,'datosTabla']); //ruta de tabla pacientes
Route::post('/trabajos/nuevo/detalle/datosClones',[DetalleController::class,'datosClones']); //ruta tabla clones 
Route::post('/trabajos/nuevo/detalle/datosDonantes',[DetalleController::class,'datosDonantes']); //ruta tabla donantes
Route::post('/trabajos/nuevo/detalle/datosDispositivos',[DetalleController::class,'datosDispositivos']); // ruta de tabla dispositivos
Route::delete('/trabajos/detalle/{id}',[DetalleController::class,'eliminarNota']);// eliminar nota
Route::post('/trabajos/nuevo/detalle/busquedaRapida',[DetalleController::class,'busquedaRapida']);//busqueda de notas 
//dispositivos de trabajo
Route::post('/trabajos/detalle/guardarDiagnostico',[DetalleController::class,'guardarDiagnostico']); // ruta de guardar diagnostico
Route::post('/trabajos/nuevo/detalle/datosPacientes',[DetalleController::class,'datosPacientes']); //ruta de orden de trabajos en (dispositivos de trabajo)
Route::post('/trabajos/nuevo/detalle/datosOtrosDispositivos',[DetalleController::class,'datosOtrosDispositivos']);//ruta orden de trabajos de otros dispositivos
Route::post('/trabajos/nuevo/detalle/modalClon',[DetalleController::class,'buscadorClon']);  //buscador clon
Route::post('/trabajos/nuevo/detalle/agregarClonBuscado',[DetalleController::class,'agregarBusquedaClon']); //agregar clon buscados
Route::post('/trabajos/nuevo/detalle/datosClonesBuscados',[DetalleController::class,'mostrarClonesBuscados']); //mostrar clones agregados
Route::post('/trabajos/nuevo/detalle/modalDonante',[DetalleController::class,'buscadorDonante']);  //buscador donante
Route::post('/trabajos/nuevo/detalle/agregarDonanteBuscado',[DetalleController::class,'agregarBusquedaDonante']); //agregar donante buscados
Route::post('/trabajos/nuevo/detalle/datosDonantesBuscados',[DetalleController::class,'mostrarDonantesBuscados']); //mostrar donantes agregados
Route::post('/trabajos/nuevo/detalle/moverUbicacion',[DetalleController::class,'ubicacionNueva']);
Route::post('/trabajos/nuevo/detalle/eliminarVariosClones',[DetalleController::class,'eliminarVariosC']);

//Archivos adjuntos
Route::post('/trabajos/detalle/subir', [DetalleController::class,'subirArchivo']);//ruta para subir archivo a drive

Route::post('/trabajos/nuevo/detalle/agregarDonante',[DetalleController::class,'agregarDonante']);  //buscador donante
Route::post('/trabajos/nuevo/detalle/guardarDiagnostico',[DetalleController::class,'guardarDiagnostico']);  // guardar diagnostico a los disp de los pacientes
Route::delete('/trabajos/nuevo/detalle/eliminarPaciente/id',[DetalleController::class,'eliminarPaciente']);
Route::delete('/trabajos/detalle',[DetalleController::class,'eliminarFilaPaciente']);// eliminar registro de disp paciente

//CLONES
Route::get('/inventario/discosUso',[ClonesController::class,'discosUso']);


//INVENTARIO
Route::get('/inventario',[InventarioController::class,'index']);
Route::get('/inventario/nuevo',[InventarioController::class,'create']);
Route::post('/inventario/nuevo',[InventarioController::class,'store']);
Route::get('/inventario/editar/{id}',[InventarioController::class,'edit']);
Route::post('/inventario/editar/{id}',[InventarioController::class,'update']);
Route::delete('/inventario/{id}',[InventarioController::class,'destroy']);
Route::get('/inventario/pdf',[InventarioController::class,'descargarPDF']); //ruta para descargar pdf
Route::get('/inventario/itemPdf/{id}',[InventarioController::class,'descargarItemPdf']); //ruta para descargar pdf (1 item)
Route::get('/inventario/imprimirInventario',[InventarioController::class,'imprimirPDF']); //imprimir pdf
Route::get('/inventario/imprimirItemPdf/{id}',[InventarioController::class,'imprimirItemPdf']); //imprimir un item del inventario
Route::get('/inventario/excel',[InventarioController::class,'descargarExcel']); //ruta para descargar excel
Route::get('/inventario/buscador',[InventarioController::class,'buscador']);  //buscador en tiempo real

Route::post('/inventario/busqueda' ,[InventarioController::class.'busqueda']);

Route::post('/inventario/ver',[InventarioController::class,'ver']); //ver inventario con ajax
Route::post('/inventario/prioridad',[InventarioController::class,'prioridad']); //filtrar dispositivos de rol
Route::post('/inventario/ingeniero',[InventarioController::class,'ingeniero']); //filtrar por tipo
Route::post('/inventario/estado',[InventarioController::class,'estado']); //filtrar por fabricante
Route::post('/inventario/factor_de_forma',[InventarioController::class,'factorDeForma']); //filtrar por factor de forma
Route::post('/inventario/redireccionar',[InventarioController::class,'redireccionar']);
Route::post('/inventario/buscadorTiempoReal',[InventarioController::class,'buscadorTiempoReal']);


//CLIENTES
Route::get('/clientes',[ClienteController::class,'index']);
Route::get('/cliente/nuevo',[ClienteController::class,'create']);
Route::post('/cliente/nuevoTho',[ClienteController::class,'createTho']);
Route::post('/cliente/nuevo/{id}',[ClienteController::class,'store']);
Route::post('/cliente/editar/datos',[ClienteController::class,'tablaEditar']);
Route::get('/cliente/editar/{id}',[ClienteController::class,'edit']);
Route::post('/cliente/editar/{id}',[ClienteController::class,'update']);
Route::delete('/cliente/{id}',[ClienteController::class,'destroy']);
Route::delete('/eliminarDatos/{id}',[ClienteController::class,'eliminarEditar']);


//FACTURACION
Route::get('/facturacion',[FacturacionController::class,'index']);
Route::get('/facturacion/asistente',[FacturacionController::class,'verAsistente']);
Route::get('/facturacion/nuevo',[FacturacionController::class,'create']);
Route::post('/facturacion/nuevo',[FacturacionController::class,'store']);
Route::get('/facturacion/editar/{id}',[FacturacionController::class,'edit']);
Route::post('/facturacion/editar/{id}',[FacturacionController::class,'update']);

Route::post('/facturacion/verFacturas',[FacturacionController::class,'datosFacturas']); //ruta tabla de facturas

//PRODUCTOS
Route::get('/productos',[ProductosController::class,'index']);
Route::get('/producto/nuevo',[ProductosController::class,'create']);
Route::post('/producto/nuevo',[ProductosController::class,'store']);
Route::get('/producto/editar/{id}',[ProductosController::class,'edit']);
Route::post('/producto/editar/{id}',[ProductosController::class,'update']);
Route::post('/producto/cambiarEstado',[ProductosController::class,'cambiarEstado']);
Route::post('/producto/moverDispositivo',[ProductosController::class,'moverDisp']);
Route::post('/producto/moverDispositivo',[ProductosController::class,'moverDisp']);
Route::delete('/producto/{id}',[ProductosController::class,'destroy']);



/*Puede llamar a un comando de Artisan fuera de la CLI.
Route::get('/clear-cache', function() {
$exitCode = Artisan::call('cache:clear');
// return what you want
});*/

Route::get('/send-mail', [MailController::class, 'index']);