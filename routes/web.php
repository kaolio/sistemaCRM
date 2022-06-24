<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\OrdenTrabajoController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\DetalleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;
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
    return view('welcome');
});

Auth::routes();

//HOME
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home/datosDashboard',[HomeController::class, 'datosDashboard']);

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
Route::post('/imagen/validar' ,[UsuarioController::class,'validar']);
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

//Detalle de trabajo
//general
Route::get('/trabajos/detalle/{id}',[DetalleController::class,'buscar']);
Route::post('/trabajos/detalle',[DetalleController::class,'buscarOrden']); //ruta buscador de orden trabajo
Route::post('/trabajos/detalle/guardarDesignado',[DetalleController::class,'guardarDesignacion']); //ruta para guardar usuario desigando
Route::post('/trabajos/detalle/guardarEstado',[DetalleController::class,'guardarEstado']); //ruta para guardar estado
Route::post('/trabajos/detalle/guardarPrioridad',[DetalleController::class,'guardarPrioridad']); //ruta para guardar prioridad
Route::post('/trabajos/detalle/NotaCliente',[DetalleController::class,'guardarNotaCliente']); //guardar nota de cliente
Route::post('/trabajos/detalle/nota',[DetalleController::class,'guardarNota']); //guardar comentario
Route::post('/trabajos/nuevo/detalle/datosTabla',[DetalleController::class,'datosTabla']); //ruta de tabla pacientes
Route::post('/trabajos/nuevo/detalle/datosDispositivos',[DetalleController::class,'datosDispositivos']); // ruta de tabla dispositivos
Route::delete('/trabajos/detalle/{id}',[DetalleController::class,'eliminarNota']);// eliminar nota
Route::post('/trabajos/nuevo/detalle/busquedaRapida',[DetalleController::class,'busquedaRapida']);//busqueda de notas 
//dispositivos de trabajo
Route::post('/trabajos/detalle/guardarDiagnostico',[DetalleController::class,'guardarDiagnostico']); // ruta de guardar diagnostico
Route::post('/trabajos/nuevo/detalle/datosPacientes',[DetalleController::class,'datosPacientes']); //ruta de orden de trabajos en (dispositivos de trabajo)
Route::post('/trabajos/nuevo/detalle/datosOtrosDispositivos',[DetalleController::class,'datosOtrosDispositivos']);//ruta orden de trabajos de otros dispositivos
//Route::post('/trabajos/nuevo/detalle/datosInventario',[DetalleController::class,'datosInventario']); //ruta de inventario en (dispositivos de trabajo)
Route::post('/trabajos/nuevo/detalle/modalDonante',[DetalleController::class,'buscadorDonante']);  //buscador donante



Route::post('/autocompletarCliente',[OrdenTrabajoController::class,'autoCompletar']);

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

//CLIENTES
Route::get('/clientes',[ClienteController::class,'index']);
Route::get('/cliente/nuevo',[ClienteController::class,'create']);
Route::post('/cliente/nuevoTho',[ClienteController::class,'createTho']);
Route::post('/cliente/nuevo/{id}',[ClienteController::class,'store']);
Route::get('/cliente/editar/{id}',[ClienteController::class,'edit']);
Route::put('/cliente/editar/{id}',[ClienteController::class,'update']);
Route::delete('/cliente/{id}',[ClienteController::class,'destroy']);

/*Puede llamar a un comando de Artisan fuera de la CLI.
Route::get('/clear-cache', function() {
$exitCode = Artisan::call('cache:clear');
// return what you want
});*/