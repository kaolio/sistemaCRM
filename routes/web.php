<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ClonesController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\OrdenTrabajoController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\DetalleController;
use App\Http\Controllers\DispositivoController;
use App\Http\Controllers\FabricanteController;
use App\Http\Controllers\FactorFormaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginClienteController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\FacturacionController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MalFuncionamientoController;
use App\Http\Controllers\PrioridadController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\TipoConexionController;
use App\Http\Controllers\TipoMonedaController;
use Illuminate\Support\Facades\Artisan;
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
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware();
Route::post('/home/datosDashboard',[HomeController::class, 'datosDashboard'])->middleware();
Route::get('/home/urgente',[HomeController::class, 'urgente'])->middleware();
Route::get('/home/completo',[HomeController::class, 'completo'])->middleware();
Route::get('/home/pagado',[HomeController::class, 'pagado'])->middleware();
Route::get('/home/pendiente',[HomeController::class, 'pendiente'])->middleware();

//LOGIN CLIENTE
Route::get('/login/cliente', [LoginClienteController::class, 'index'])->middleware();
Route::get('/login/cliente/{id}', [LoginClienteController::class, 'vistaCliente'])->middleware();
Route::post('/login/cliente', [LoginClienteController::class, 'start'])->middleware();

//ROLES
Route::get('/roles',[RolesController::class,'index'])->middleware();
Route::get('/roles',[RolesController::class,'index'])->middleware();
Route::get('/roles/nuevo',[RolesController::class,'create'])->middleware();
Route::post('/roles/nuevo',[RolesController::class,'store'])->middleware();
Route::get('/roles/editar/{id}',[RolesController::class,'edit'])->middleware();
Route::patch('/roles/nuevo/{id}',[RolesController::class,'update'])->middleware();
Route::delete('/roles/{id}',[RolesController::class,'destroy'])->middleware();

//USUARIOS
Route::get('/usuarios',[UsuarioController::class,'index'])->middleware();
Route::get('/usuario/nuevo',[UsuarioController::class,'create'])->middleware();
Route::post('/usuario/nuevo',[UsuarioController::class,'store'])->middleware();
Route::get('/usuario/editar/{id}',[UsuarioController::class,'edit'])->middleware();
Route::post('/usuario/editar/{id}',[UsuarioController::class,'update'])->middleware();
//Route::post('/imagen/validar' ,[UsuarioController::class,'validar'])->middleware();
Route::delete('/usuario/{id}',[UsuarioController::class,'destroy'])->middleware();
//Edicion foto
Route::post('/usuario/foto', [UsuarioController::class,'updatePhoto'])->middleware();

//script
Route::post('/usuario/nuevo/validarCorreo', [UsuarioController::class,'validarCorreo'])->middleware();
 
//ORDEN DE TRABAJO
Route::get('/trabajos/ver',[OrdenTrabajoController::class,'ver'])->middleware();
Route::get('/trabajos',[OrdenTrabajoController::class,'index'])->middleware();
Route::delete('/trabajo/{id}',[OrdenTrabajoController::class,'destroy'])->middleware();
Route::get('/trabajo/nuevo',[OrdenTrabajoController::class,'create'])->name('orden')->middleware();
Route::post('/trabajo/nuevo',[OrdenTrabajoController::class,'store'])->middleware();
Route::post('/trabajo/prioridad',[OrdenTrabajoController::class,'prioridad'])->middleware();
Route::post('/trabajo/estado',[OrdenTrabajoController::class,'estado'])->middleware();
Route::post('/trabajo/ingeniero',[OrdenTrabajoController::class,'ingeniero'])->middleware();
Route::get('/trabajo/buscador',[OrdenTrabajoController::class,'buscador'])->middleware();
Route::post('/trabajo/ver',[OrdenTrabajoController::class,'ver'])->middleware();
Route::post('/trabajo/redireccionar',[OrdenTrabajoController::class,'redireccionar'])->middleware();
Route::post('/trabajo/tiempoReal',[OrdenTrabajoController::class,'buscaTiempoReal'])->middleware();
Route::post('/trabajo/cambioPrioridad',[OrdenTrabajoController::class,'cambioPrioridadNueva'])->middleware();
Route::post('/trabajo/cambioEstado',[OrdenTrabajoController::class,'cambioEstadoNuevo'])->middleware();
Route::post('/trabajo/eliminarVarios',[OrdenTrabajoController::class,'eliminarVarios'])->middleware();
Route::post('/trabajo/imprimir',[OrdenTrabajoController::class,'variosPDF'])->middleware();
Route::get('/trabajo/pdf',[OrdenTrabajoController::class,'descargarPDF'])->middleware(); //ruta para descargar pdf
Route::get('/trabajo/excel',[OrdenTrabajoController::class,'descargarExcel'])->middleware(); //ruta para descargar excel
Route::get('/trabajo/imprimirIndex',[OrdenTrabajoController::class,'imprimirPDF'])->middleware(); //imprimir pdf
Route::get('/trabajo/imprimirOrden/{id}',[OrdenTrabajoController::class,'imprimirOrden'])->middleware(); //imprimir orden especifica
Route::get('/trabajo/imprimirContrato/{id}',[OrdenTrabajoController::class,'imprimirContrato'])->middleware(); //imprimir orden especifica

Route::post('/trabajo/nuevo/buscarClientes',[OrdenTrabajoController::class,'buscarClientes'])->middleware();
Route::post('/trabajo/nuevo/tiempoEstimado',[OrdenTrabajoController::class,'tiempoEstimado'])->middleware();
Route::post('/autocompletarCliente',[OrdenTrabajoController::class,'autoCompletar'])->middleware();
Route::get('/trabajo/general',[OrdenTrabajoController::class,'general'])->middleware();

//Detalle de trabajo
//general

Route::post('/trabajos/nuevo/detalle/servicio',[ServicioController::class,'guardarTabla'])->middleware();
Route::post('/trabajos/nuevo/detalle/guardarServicio',[ServicioController::class,'guardar'])->middleware();
Route::post('/trabajos/nuevo/detalle/editarServicio',[ServicioController::class,'edit7'])->middleware();
Route::post('/trabajos/nuevo/detalle/enviarServicio',[ServicioController::class,'enviar'])->middleware();
Route::post('/detalleServicio/eliminar',[ServicioController::class,'destroy'])->middleware();

Route::get('/trabajos/detalle/{id}',[DetalleController::class,'buscar'])->middleware();
Route::post('/trabajos/detalle',[DetalleController::class,'buscarOrden'])->middleware(); //ruta buscador de orden trabajo
Route::post('/trabajos/detalle/mostrarPrecio',[DetalleController::class,'mostrarPrecio'])->middleware();
Route::post('/trabajos/detalle/guardarDesignado',[DetalleController::class,'guardarDesignacion'])->middleware(); //ruta para guardar usuario desigando
Route::post('/trabajos/detalle/guardarEstado',[DetalleController::class,'guardarEstado'])->middleware(); //ruta para guardar estado
Route::post('/trabajos/detalle/guardarPrioridad',[DetalleController::class,'guardarPrioridad'])->middleware(); //ruta para guardar prioridad
Route::post('/trabajos/detalle/nota',[DetalleController::class,'guardarNota'])->middleware(); //guardar comentario
Route::post('/trabajos/detalle/editCliente',[DetalleController::class,'actualizarCliente'])->middleware();
Route::post('/trabajos/nuevo/detalle/datosTabla',[DetalleController::class,'datosTabla'])->middleware(); //ruta de tabla pacientes
Route::post('/trabajos/nuevo/detalle/datosClones',[DetalleController::class,'datosClones'])->middleware(); //ruta tabla clones 
Route::post('/trabajos/nuevo/detalle/datosDonantes',[DetalleController::class,'datosDonantes'])->middleware(); //ruta tabla donantes
Route::post('/trabajos/nuevo/detalle/datosDispositivos',[DetalleController::class,'datosDispositivos'])->middleware(); // ruta de tabla dispositivos
Route::delete('/trabajos/detalle/{id}',[DetalleController::class,'eliminarNota'])->middleware();// eliminar nota
Route::post('/trabajos/nuevo/detalle/busquedaRapida',[DetalleController::class,'busquedaRapida'])->middleware();//busqueda de notas 
//dispositivos de trabajo 
Route::delete('/eliminarOtrosDispositivos/{id}',[DetalleController::class,'eliminarOtroDispositivo'])->middleware();
//Route::post('/trabajos/detalle/guardarDiagnostico',[DetalleController::class,'guardarDiagnostico'])->middleware(); // ruta de guardar diagnostico
Route::post('/trabajos/nuevo/detalle/datosPacientes',[DetalleController::class,'datosPacientes'])->middleware(); //ruta de orden de trabajos en (dispositivos de trabajo)
Route::post('/trabajos/nuevo/detalle/datosOtrosDispositivos',[DetalleController::class,'datosOtrosDispositivos'])->middleware();//ruta orden de trabajos de otros dispositivos
Route::post('/trabajos/nuevo/detalle/modalClon',[DetalleController::class,'buscadorClon'])->middleware();  //buscador clon
Route::post('/trabajos/nuevo/detalle/agregarClonBuscado',[DetalleController::class,'agregarBusquedaClon'])->middleware(); //agregar clon buscados
Route::post('/trabajos/nuevo/detalle/datosClonesBuscados',[DetalleController::class,'mostrarClonesBuscados'])->middleware(); //mostrar clones agregados
Route::post('/trabajos/nuevo/detalle/modalDonante',[DetalleController::class,'buscadorDonante'])->middleware();  //buscador donante
Route::post('/trabajos/nuevo/detalle/agregarDonanteBuscado',[DetalleController::class,'agregarBusquedaDonante'])->middleware(); //agregar donante buscados
Route::post('/trabajos/nuevo/detalle/datosDonantesBuscados',[DetalleController::class,'mostrarDonantesBuscados'])->middleware(); //mostrar donantes agregados
Route::post('/trabajos/nuevo/detalle/moverUbicacion',[DetalleController::class,'ubicacionNueva'])->middleware();
Route::post('/trabajos/nuevo/detalle/eliminarVariosClones',[DetalleController::class,'eliminarVariosC'])->middleware();//eliminar varios cheks
Route::post('/trabajos/nuevo/detalle/moverDispositivoRecuperar',[DetalleController::class,'moverDispositivoRecuperar'])->middleware();
Route::post('/trabajos/nuevo/detalle/moverOtroDispositivo',[DetalleController::class,'moverDispositivOtro'])->middleware();
Route::post('/trabajos/nuevo/detalle/guardarNuevoDispositivo',[DetalleController::class,'guardarNuevoDispositivo'])->middleware();
Route::post('/trabajos/nuevo/detalle/actualizarDispositivo',[DetalleController::class,'actualizarDispositivo'])->middleware();
Route::post('/trabajos/nuevo/detalle/actualizarOtroDispositivo',[DetalleController::class,'actualizarDispositivOtro'])->middleware();
Route::post('/trabajos/nuevo/detalle/obtenerValores',[DetalleController::class,'obtenerValores'])->middleware();
Route::post('/trabajos/nuevo/detalle/eliminarDispositivoRecuperar',[DetalleController::class,'eliminarDispositivoRecuperar'])->middleware();
Route::post('/trabajos/nuevo/detalle/eliminarOtroDispositivo',[DetalleController::class,'eliminarDispositivOtro'])->middleware();
Route::post('/trabajos/nuevo/detalle/eliminarClones',[DetalleController::class,'eliminarDispositivoClon'])->middleware();
Route::post('/trabajos/nuevo/detalle/eliminarDonantes',[DetalleController::class,'eliminarDispositivoDonante'])->middleware();
Route::post('/trabajos/nuevo/detalle/agregarDonante',[DetalleController::class,'agregarDonante'])->middleware();  //buscador donante
Route::post('/trabajos/nuevo/detalle/guardarDiagnosticoRecuperacion',[DetalleController::class,'guardarDiagnosticoRecuperacion'])->middleware();  // guardar diagnostico a los disp de los pacientes
Route::delete('/trabajos/nuevo/detalle/eliminarPaciente/id',[DetalleController::class,'eliminarPaciente'])->middleware();
Route::delete('/trabajos/detalle',[DetalleController::class,'eliminarFilaPaciente'])->middleware();// eliminar registro de disp paciente


//CLONES
Route::get('/inventario/discosUso',[ClonesController::class,'discosUso'])->middleware();
Route::delete('/discosUso/{id}',[ClonesController::class,'destroy'])->middleware();
Route::post('/inventario/discosUso/obtenerValores',[ClonesController::class,'obtenerValores'])->middleware();
Route::post('/inventario/discosUso/moverUbicacion',[ClonesController::class,'ubicacionNuevaVolcados'])->middleware();
//Route::get('/trabajos/detalle/{id}',[ClonesController::class,'edit'])->middleware();


//INVENTARIO
Route::get('/inventario',[InventarioController::class,'index'])->middleware();
Route::get('/inventario/nuevo',[InventarioController::class,'create'])->middleware();
Route::post('/inventario/nuevo',[InventarioController::class,'store'])->middleware();
Route::get('/inventario/editar/{id}',[InventarioController::class,'edit'])->middleware();
Route::post('/inventario/editar/{id}',[InventarioController::class,'update'])->middleware();
Route::delete('/inventario/{id}',[InventarioController::class,'destroy'])->middleware();
Route::get('/inventario/pdf',[InventarioController::class,'descargarPDF'])->middleware(); //ruta para descargar pdf
Route::get('/inventario/itemPdf/{id}',[InventarioController::class,'descargarItemPdf'])->middleware(); //ruta para descargar pdf (1 item)
Route::get('/inventario/imprimirInventario',[InventarioController::class,'imprimirPDF'])->middleware(); //imprimir pdf
Route::get('/inventario/imprimirItemPdf/{id}',[InventarioController::class,'imprimirItemPdf'])->middleware(); //imprimir un item del inventario
Route::get('/inventario/excel',[InventarioController::class,'descargarExcel'])->middleware(); //ruta para descargar excel
Route::get('/inventario/buscador',[InventarioController::class,'buscador'])->middleware();  //buscador en tiempo real

Route::post('/inventario/busqueda' ,[InventarioController::class.'busqueda'])->middleware();

Route::post('/inventario/ver',[InventarioController::class,'ver'])->middleware(); //ver inventario con ajax
Route::post('/inventario/prioridad',[InventarioController::class,'prioridad'])->middleware(); //filtrar dispositivos de rol
Route::post('/inventario/ingeniero',[InventarioController::class,'ingeniero'])->middleware(); //filtrar por tipo
Route::post('/inventario/estado',[InventarioController::class,'estado'])->middleware(); //filtrar por fabricante
Route::post('/inventario/factor_de_forma',[InventarioController::class,'factorDeForma'])->middleware(); //filtrar por factor de forma
Route::post('/inventario/redireccionar',[InventarioController::class,'redireccionar'])->middleware();
Route::post('/inventario/buscadorTiempoReal',[InventarioController::class,'buscadorTiempoReal'])->middleware();
Route::post('/inventario/moverDisco',[InventarioController::class,'moverDisco'])->middleware();

 
//CLIENTES
Route::get('/clientes',[ClienteController::class,'index'])->middleware();
Route::get('/cliente/nuevo',[ClienteController::class,'create'])->middleware();
Route::post('/cliente/nuevoTho',[ClienteController::class,'createTho'])->middleware();
Route::post('/cliente/nuevo/{id}',[ClienteController::class,'store'])->middleware();
Route::get('/cliente/editar/{id}',[ClienteController::class,'edit'])->middleware();
Route::post('/cliente/editar/{id}',[ClienteController::class,'update'])->middleware();
Route::delete('/cliente/{id}',[ClienteController::class,'destroy'])->middleware();
Route::get('/cliente/pdf',[ClienteController::class,'descargarPDF'])->middleware(); //ruta para descargar pdf
Route::get('/cliente/excel',[ClienteController::class,'descargarExcel'])->middleware(); //ruta para descargar excel
Route::get('/cliente/imprimirIndex',[ClienteController::class,'imprimirPDF'])->middleware(); //imprimir pdf


/*//FACTURACION
Route::get('/facturacion',[FacturacionController::class,'index'])->middleware();
Route::get('/facturacion/asistente',[FacturacionController::class,'verAsistente'])->middleware();
Route::get('/facturacion/nuevo',[FacturacionController::class,'create'])->middleware();
Route::post('/facturacion/nuevo',[FacturacionController::class,'store'])->middleware();
Route::get('/facturacion/editar/{id}',[FacturacionController::class,'edit'])->middleware();
Route::post('/facturacion/editar/{id}',[FacturacionController::class,'update'])->middleware();*/
//Route::post('/facturacion/verFacturas',[FacturacionController::class,'datosFacturas'])->middleware(); //ruta tabla de facturas

//filelist
Route::post('/subirHtml/{id}',[ImagenController::class,'subirArchivo'])->name('elMilagro')->middleware();//ruta para subir archivo a drive
Route::get('/trabajos/detalle/fileList/{id}',[ImagenController::class,'verFileList'])->middleware();//FILE LIST
Route::get('/trabajos/detalle/fileList/descargar/{id}',[ImagenController::class,'descargarFileList'])->middleware();//FILE LIST DONWLOAD
Route::delete('/trabajos/detalle/fileList/eliminar/{id}',[ImagenController::class,'eliminarFileList'])->middleware();//FILE LIST DELETE

//IMAGEN
Route::post('/subirImagen/{id}',[ImagenController::class,'subirImagen'])->name('Imagen')->middleware();//ruta para subir archivo a drive
Route::delete('/trabajos/detalle/fileImage/eliminar/{id}',[ImagenController::class,'eliminarFileImage'])->middleware();//FILE LIST DELETE

//PRODUCTOS
Route::get('/productos',[ProductosController::class,'index'])->middleware();
Route::get('/producto/nuevo',[ProductosController::class,'create'])->middleware();
Route::post('/producto/nuevo',[ProductosController::class,'store'])->middleware();
Route::get('/producto/editar/{id}',[ProductosController::class,'edit'])->middleware();
Route::post('/producto/editar/{id}',[ProductosController::class,'update'])->middleware();
Route::post('/producto/cambiarEstado',[ProductosController::class,'cambiarEstado'])->middleware();
Route::post('/producto/moverDispositivo',[ProductosController::class,'moverDisp'])->middleware();
Route::post('/producto/moverDispositivo',[ProductosController::class,'moverDisp'])->middleware();
Route::delete('/producto/{id}',[ProductosController::class,'destroy'])->middleware();

//CONFIGURACION
Route::get('/configuraciones',[ConfiguracionController::class,'index'])->middleware();

//PRIORIDAD
Route::post('/configuracion/nuevaPrioridad',[PrioridadController::class,'nuevaPrioridad'])->middleware();
Route::post('/configuracion/datosPrioridad',[PrioridadController::class,'datosPrioridad'])->middleware();
Route::post('/configuracion/actualizarPrioridad',[PrioridadController::class,'actualizarPrioridad'])->middleware();
Route::post('/configuracion/eliminarPrioridad',[PrioridadController::class,'eliminar'])->middleware();

//DISPOSITIVO
Route::post('/configuracion/nuevoDispositivo',[DispositivoController::class,'nuevoDispositivo'])->middleware();
Route::post('/configuracion/datosDispositivo',[DispositivoController::class,'datosDispositivo'])->middleware();
Route::post('/configuracion/actualizarDispositivo',[DispositivoController::class,'actualizarDispositivo'])->middleware();
Route::post('/configuracion/eliminarDispositivo',[DispositivoController::class,'eliminarDispositivo'])->middleware();

//FABRICANTE
Route::post('/configuracion/nuevoFabricante',[FabricanteController::class,'nuevoFabricante'])->middleware();
Route::post('/configuracion/datosFabricante',[FabricanteController::class,'datosFabricante'])->middleware();
Route::post('/configuracion/actualizarFabricante',[FabricanteController::class,'actualizarFabricante'])->middleware();
Route::post('/configuracion/eliminarFabricante',[FabricanteController::class,'eliminarFabricante'])->middleware();

//TIPO DE DAÑO
Route::post('/configuracion/nuevoTipoDano',[MalFuncionamientoController::class,'nuevoTipoDaño'])->middleware();
Route::post('/configuracion/datosTipoDano',[MalFuncionamientoController::class,'datosTipoDaño'])->middleware();
Route::post('/configuracion/actualizarTipoDano',[MalFuncionamientoController::class,'actualizarTipoDaño'])->middleware();
Route::post('/configuracion/eliminarTipoDano',[MalFuncionamientoController::class,'eliminarTipoDaño'])->middleware();

//FACTOR DE FORMA
Route::post('/configuracion/nuevoFactor',[FactorFormaController::class,'nuevoFactor'])->middleware();
Route::post('/configuracion/datosFactor',[FactorFormaController::class,'datosFactor'])->middleware();
Route::post('/configuracion/actualizarFactor',[FactorFormaController::class,'actualizarFactor'])->middleware();
Route::post('/configuracion/eliminarFactor',[FactorFormaController::class,'eliminarFactor'])->middleware();

//TIPO DE CONEXION
Route::post('/configuracion/nuevoConexion',[TipoConexionController::class,'nuevoConexion'])->middleware();
Route::post('/configuracion/datosConexion',[TipoConexionController::class,'datosConexion'])->middleware();
Route::post('/configuracion/actualizarConexion',[TipoConexionController::class,'actualizarConexion'])->middleware();
Route::post('/configuracion/eliminarConexion',[TipoConexionController::class,'eliminarConexion'])->middleware();

//TIPO DE MONEDA
Route::post('/configuracion/nuevoValor',[TipoMonedaController::class,'nuevoValor'])->middleware();
Route::post('/configuracion/datosValores',[TipoMonedaController::class,'datosValores'])->middleware();
Route::post('/configuracion/actualizarValor',[TipoMonedaController::class,'actualizarValor'])->middleware();
Route::post('/configuracion/eliminarValor',[TipoMonedaController::class,'eliminarValor'])->middleware();
 

/*Puede llamar a un comando de Artisan fuera de la CLI.
Route::get('/clear-cache', function() {
$exitCode = Artisan::call('cache:clear')->middleware();
// return what you want
})->middleware();*/  

Route::get('/send-mail', [MailController::class, 'index'])->middleware();

//Route::get('storage_link', function(){
  //  Artisan::call('storage:link')->middleware();
//})->middleware();

Route::get('/foo', function () {
  Artisan::call('optimize:clear');
});
