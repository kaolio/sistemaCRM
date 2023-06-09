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
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\InicioSesionController;
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
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::post('/home/datosDashboard',[HomeController::class, 'datosDashboard'])->middleware('auth');
Route::get('/home/urgente',[HomeController::class, 'urgente'])->middleware('auth');
Route::get('/home/completo',[HomeController::class, 'completo'])->middleware('auth');
Route::get('/home/pagado',[HomeController::class, 'pagado'])->middleware('auth');
Route::get('/home/pendiente',[HomeController::class, 'pendiente'])->middleware('auth');

//LOGIN CLIENTE
Route::get('/login/cliente', [LoginClienteController::class, 'index'])->middleware('auth');
Route::get('/login/cliente/{id}', [LoginClienteController::class, 'vistaCliente'])->middleware('auth');
Route::post('/login/cliente', [LoginClienteController::class, 'start'])->middleware('auth');

//ROLES
Route::get('/roles',[RolesController::class,'index'])->middleware('auth');
Route::get('/roles',[RolesController::class,'index'])->middleware('auth');
Route::get('/roles/nuevo',[RolesController::class,'create'])->middleware('auth');
Route::post('/roles/nuevo',[RolesController::class,'store'])->middleware('auth');
Route::get('/roles/editar/{id}',[RolesController::class,'edit'])->middleware('auth');
Route::patch('/roles/nuevo/{id}',[RolesController::class,'update'])->middleware('auth');
Route::delete('/roles/{id}',[RolesController::class,'destroy'])->middleware('auth');

//USUARIOS
Route::get('/usuarios',[UsuarioController::class,'index'])->middleware('auth');
Route::get('/usuario/nuevo',[UsuarioController::class,'create'])->middleware('auth');
Route::post('/usuario/nuevo',[UsuarioController::class,'store'])->middleware('auth');
Route::get('/usuario/editar/{id}',[UsuarioController::class,'edit'])->middleware('auth');
Route::post('/usuario/editar/{id}',[UsuarioController::class,'update'])->middleware('auth');
//Route::post('/imagen/validar' ,[UsuarioController::class,'validar'])->middleware('auth');
Route::delete('/usuario/{id}',[UsuarioController::class,'destroy'])->middleware('auth');
//Edicion foto
Route::post('/usuario/foto', [UsuarioController::class,'updatePhoto'])->middleware('auth');

//script
Route::post('/usuario/nuevo/validarCorreo', [UsuarioController::class,'validarCorreo'])->middleware('auth');
 
//ORDEN DE TRABAJO
Route::get('/trabajos/ver',[OrdenTrabajoController::class,'ver'])->middleware('auth');
Route::get('/trabajos',[OrdenTrabajoController::class,'index'])->middleware('auth');
Route::delete('/trabajo/{id}',[OrdenTrabajoController::class,'destroy'])->middleware('auth');
Route::get('/trabajo/nuevo',[OrdenTrabajoController::class,'create'])->name('orden')->middleware('auth');
Route::post('/trabajo/nuevo',[OrdenTrabajoController::class,'store'])->middleware('auth');
Route::post('/trabajo/prioridad',[OrdenTrabajoController::class,'prioridad'])->middleware('auth');
Route::post('/trabajo/estado',[OrdenTrabajoController::class,'estado'])->middleware('auth');
Route::post('/trabajo/ingeniero',[OrdenTrabajoController::class,'ingeniero'])->middleware('auth');
Route::get('/trabajo/buscador',[OrdenTrabajoController::class,'buscador'])->middleware('auth');
Route::post('/trabajo/ver',[OrdenTrabajoController::class,'ver'])->middleware('auth');
Route::post('/trabajo/redireccionar',[OrdenTrabajoController::class,'redireccionar'])->middleware('auth');
Route::post('/trabajo/tiempoReal',[OrdenTrabajoController::class,'buscaTiempoReal'])->middleware('auth');
Route::post('/trabajo/cambioPrioridad',[OrdenTrabajoController::class,'cambioPrioridadNueva'])->middleware('auth');
Route::post('/trabajo/cambioEstado',[OrdenTrabajoController::class,'cambioEstadoNuevo'])->middleware('auth');
Route::post('/trabajo/eliminarVarios',[OrdenTrabajoController::class,'eliminarVarios'])->middleware('auth');
Route::get('/trabajo/imprimir/{id}',[OrdenTrabajoController::class,'variosPDF'])->middleware('auth');
Route::get('/trabajo/pdf',[OrdenTrabajoController::class,'descargarPDF'])->middleware('auth'); //ruta para descargar pdf
Route::get('/trabajo/excel',[OrdenTrabajoController::class,'descargarExcel'])->middleware('auth'); //ruta para descargar excel
Route::get('/trabajo/imprimirIndex',[OrdenTrabajoController::class,'imprimirPDF'])->middleware('auth'); //imprimir pdf
Route::get('/trabajo/imprimirOrden/{id}',[OrdenTrabajoController::class,'imprimirOrden'])->middleware('auth'); //imprimir orden especifica
Route::get('/trabajo/imprimirContrato/{id}',[OrdenTrabajoController::class,'imprimirContrato'])->middleware('auth'); //imprimir orden especifica

Route::post('/trabajo/nuevo/buscarClientes',[OrdenTrabajoController::class,'buscarClientes'])->middleware('auth');
Route::post('/trabajo/nuevo/tiempoEstimado',[OrdenTrabajoController::class,'tiempoEstimado'])->middleware('auth');
Route::post('/autocompletarCliente',[OrdenTrabajoController::class,'autoCompletar'])->middleware('auth');
Route::get('/trabajo/general',[OrdenTrabajoController::class,'general'])->middleware('auth');

//Detalle de trabajo
//general

Route::post('/trabajos/nuevo/detalle/servicio',[ServicioController::class,'guardarTabla'])->middleware('auth');
Route::post('/trabajos/nuevo/detalle/guardarServicio',[ServicioController::class,'guardar'])->middleware('auth');
Route::post('/trabajos/nuevo/detalle/editarServicio',[ServicioController::class,'edit'])->middleware('auth');
Route::post('/trabajos/nuevo/detalle/enviarServicio',[ServicioController::class,'enviar'])->middleware('auth');
Route::post('/trabajos/nuevo/detalle/enviarNota',[ServicioController::class,'enviarNota'])->middleware('auth');
Route::post('/detalleServicio/eliminar',[ServicioController::class,'destroy'])->middleware('auth');

Route::get('/trabajos/detalle/{id}',[DetalleController::class,'buscar'])->middleware('auth');
Route::post('/trabajos/detalle',[DetalleController::class,'buscarOrden'])->middleware('auth'); //ruta buscador de orden trabajo
Route::post('/trabajos/detalle/mostrarPrecio',[DetalleController::class,'mostrarPrecio'])->middleware('auth');
Route::post('/trabajos/detalle/guardarDesignado',[DetalleController::class,'guardarDesignacion'])->middleware('auth'); //ruta para guardar usuario desigando
Route::post('/trabajos/detalle/guardarEstado',[DetalleController::class,'guardarEstado'])->middleware('auth'); //ruta para guardar estado
Route::post('/trabajos/detalle/guardarPrioridad',[DetalleController::class,'guardarPrioridad'])->middleware('auth'); //ruta para guardar prioridad
Route::post('/trabajos/detalle/nota',[DetalleController::class,'guardarNota'])->middleware('auth'); //guardar comentario
Route::post('/trabajos/detalle/editCliente',[DetalleController::class,'actualizarCliente'])->middleware('auth');
Route::post('/trabajos/nuevo/detalle/datosTabla',[DetalleController::class,'datosTabla'])->middleware('auth'); //ruta de tabla pacientes
Route::post('/trabajos/nuevo/detalle/datosClones',[DetalleController::class,'datosClones'])->middleware('auth'); //ruta tabla clones 
Route::post('/trabajos/nuevo/detalle/datosDonantes',[DetalleController::class,'datosDonantes'])->middleware('auth'); //ruta tabla donantes
Route::post('/trabajos/nuevo/detalle/datosDispositivos',[DetalleController::class,'datosDispositivos'])->middleware('auth'); // ruta de tabla dispositivos
Route::post('/trabajos/detalle/eliminarNota',[DetalleController::class,'eliminarNotas'])->middleware('auth');// eliminar nota
Route::post('/trabajos/nuevo/detalle/busquedaRapida',[DetalleController::class,'busquedaRapida'])->middleware('auth');//busqueda de notas 
//dispositivos de trabajo 
Route::delete('/eliminarOtrosDispositivos/{id}',[DetalleController::class,'eliminarOtroDispositivo'])->middleware('auth');
//Route::post('/trabajos/detalle/guardarDiagnostico',[DetalleController::class,'guardarDiagnostico'])->middleware('auth'); // ruta de guardar diagnostico
Route::post('/trabajos/nuevo/detalle/datosPacientes',[DetalleController::class,'datosPacientes'])->middleware('auth'); //ruta de orden de trabajos en (dispositivos de trabajo)
Route::post('/trabajos/nuevo/detalle/datosOtrosDispositivos',[DetalleController::class,'datosOtrosDispositivos'])->middleware('auth');//ruta orden de trabajos de otros dispositivos
Route::post('/trabajos/nuevo/detalle/modalClon',[DetalleController::class,'buscadorClon'])->middleware('auth');  //buscador clon
Route::post('/trabajos/nuevo/detalle/agregarClonBuscado',[DetalleController::class,'agregarBusquedaClon'])->middleware('auth'); //agregar clon buscados
Route::post('/trabajos/nuevo/detalle/datosClonesBuscados',[DetalleController::class,'mostrarClonesBuscados'])->middleware('auth'); //mostrar clones agregados
Route::post('/trabajos/nuevo/detalle/modalDonante',[DetalleController::class,'buscadorDonante'])->middleware('auth');  //buscador donante
Route::post('/trabajos/nuevo/detalle/agregarDonanteBuscado',[DetalleController::class,'agregarBusquedaDonante'])->middleware('auth'); //agregar donante buscados
Route::post('/trabajos/nuevo/detalle/datosDonantesBuscados',[DetalleController::class,'mostrarDonantesBuscados'])->middleware('auth'); //mostrar donantes agregados
Route::post('/trabajos/nuevo/detalle/moverUbicacion',[DetalleController::class,'ubicacionNueva'])->middleware('auth');
Route::post('/trabajos/nuevo/detalle/eliminarVariosDispositivos',[DetalleController::class,'eliminarVariosC'])->middleware('auth');//eliminar varios cheks
Route::post('/trabajos/nuevo/detalle/moverDispositivoRecuperar',[DetalleController::class,'moverDispositivoRecuperar'])->middleware('auth');
Route::post('/trabajos/nuevo/detalle/moverOtroDispositivo',[DetalleController::class,'moverDispositivOtro'])->middleware('auth');
Route::post('/trabajos/nuevo/detalle/guardarNuevoDispositivo',[DetalleController::class,'guardarNuevoDispositivo'])->middleware('auth');
Route::post('/trabajos/nuevo/detalle/guardarNuevoDispositivoVolcado',[DetalleController::class,'guardarNuevoDispositivoVolcado'])->middleware('auth');
Route::post('/trabajos/nuevo/detalle/actualizarDispositivo',[DetalleController::class,'actualizarDispositivo'])->middleware('auth');
Route::post('/trabajos/nuevo/detalle/actualizarOtroDispositivo',[DetalleController::class,'actualizarDispositivOtro'])->middleware('auth');
Route::post('/trabajos/nuevo/detalle/obtenerValores',[DetalleController::class,'obtenerValores'])->middleware('auth');
Route::post('/trabajos/nuevo/detalle/eliminarDispositivoRecuperar',[DetalleController::class,'eliminarDispositivoRecuperar'])->middleware('auth');
Route::post('/trabajos/nuevo/detalle/eliminarOtroDispositivo',[DetalleController::class,'eliminarDispositivOtro'])->middleware('auth');
Route::post('/trabajos/nuevo/detalle/eliminarClones',[DetalleController::class,'eliminarDispositivoClon'])->middleware('auth');
Route::post('/trabajos/nuevo/detalle/eliminarDonantes',[DetalleController::class,'eliminarDispositivoDonante'])->middleware('auth');
Route::post('/trabajos/nuevo/detalle/agregarDonante',[DetalleController::class,'agregarDonante'])->middleware('auth');  //buscador donante
Route::post('/trabajos/nuevo/detalle/guardarDiagnosticoRecuperacion',[DetalleController::class,'guardarDiagnosticoRecuperacion'])->middleware('auth');  // guardar diagnostico a los disp de los pacientes
Route::delete('/trabajos/nuevo/detalle/eliminarPaciente/id',[DetalleController::class,'eliminarPaciente'])->middleware('auth');
Route::delete('/trabajos/detalle',[DetalleController::class,'eliminarFilaPaciente'])->middleware('auth');// eliminar registro de disp paciente
Route::post('/trabajos/detalle/notasCargadas',[DetalleController::class,'datosNotas'])->middleware('auth');//  registro de notas

//CLONES
Route::get('/inventario/discosUso',[ClonesController::class,'discosUso'])->middleware('auth');
Route::delete('/discosUso/{id}',[ClonesController::class,'destroy'])->middleware('auth');
Route::post('/inventario/discosUso/obtenerValores',[ClonesController::class,'obtenerValores'])->middleware('auth');
Route::post('/inventario/discosUso/moverUbicacion',[ClonesController::class,'ubicacionNuevaVolcados'])->middleware('auth');
//Route::get('/trabajos/detalle/{id}',[ClonesController::class,'edit'])->middleware('auth');


//INVENTARIO
Route::get('/inventario',[InventarioController::class,'index'])->middleware('auth');
Route::get('/inventario/nuevo',[InventarioController::class,'create'])->middleware('auth');
Route::post('/inventario/nuevo',[InventarioController::class,'store'])->middleware('auth');
Route::get('/inventario/editar/{id}',[InventarioController::class,'edit'])->middleware('auth');
Route::post('/inventario/editar/{id}',[InventarioController::class,'update'])->middleware('auth');
Route::post('/inventario/eliminar/image',[InventarioController::class,'eliminarImagen'])->middleware('auth');
Route::delete('/inventario/{id}',[InventarioController::class,'destroy'])->middleware('auth');
Route::get('/inventario/pdf',[InventarioController::class,'descargarPDF'])->middleware('auth'); //ruta para descargar pdf
Route::get('/inventario/itemPdf/{id}',[InventarioController::class,'descargarItemPdf'])->middleware('auth'); //ruta para descargar pdf (1 item)
Route::get('/inventario/imprimirInventario',[InventarioController::class,'imprimirPDF'])->middleware('auth'); //imprimir pdf
Route::get('/inventario/imprimirItemPdf/{id}',[InventarioController::class,'imprimirItemPdf'])->middleware('auth'); //imprimir un item del inventario
Route::get('/inventario/excel',[InventarioController::class,'descargarExcel'])->middleware('auth'); //ruta para descargar excel
Route::get('/inventario/buscador',[InventarioController::class,'buscador'])->middleware('auth');  //buscador en tiempo real

Route::post('/inventario/busqueda' ,[InventarioController::class.'busqueda'])->middleware('auth');

Route::post('/inventario/ver',[InventarioController::class,'ver'])->middleware('auth'); //ver inventario con ajax
Route::post('/inventario/prioridad',[InventarioController::class,'prioridad'])->middleware('auth'); //filtrar dispositivos de rol
Route::post('/inventario/ingeniero',[InventarioController::class,'ingeniero'])->middleware('auth'); //filtrar por tipo
Route::post('/inventario/estado',[InventarioController::class,'estado'])->middleware('auth'); //filtrar por fabricante
Route::post('/inventario/factor_de_forma',[InventarioController::class,'factorDeForma'])->middleware('auth'); //filtrar por factor de forma
Route::post('/inventario/redireccionar',[InventarioController::class,'redireccionar'])->middleware('auth');
Route::post('/inventario/buscadorTiempoReal',[InventarioController::class,'buscadorTiempoReal'])->middleware('auth');
Route::post('/inventario/moverDisco',[InventarioController::class,'moverDisco'])->middleware('auth');


 
//CLIENTES
Route::get('/clientes',[ClienteController::class,'index'])->middleware('auth');
Route::get('/cliente/nuevo',[ClienteController::class,'create'])->middleware('auth');
Route::post('/cliente/nuevoTho',[ClienteController::class,'createTho'])->middleware('auth');
Route::post('/cliente/nuevo/{id}',[ClienteController::class,'store'])->middleware('auth');
Route::get('/cliente/editar/{id}',[ClienteController::class,'edit'])->middleware('auth');
Route::post('/cliente/editar/{id}',[ClienteController::class,'update'])->middleware('auth');
Route::delete('/cliente/{id}',[ClienteController::class,'destroy'])->middleware('auth');
Route::get('/cliente/pdf',[ClienteController::class,'descargarPDF'])->middleware('auth'); //ruta para descargar pdf
Route::get('/cliente/excel',[ClienteController::class,'descargarExcel'])->middleware('auth'); //ruta para descargar excel
Route::get('/cliente/imprimirIndex',[ClienteController::class,'imprimirPDF'])->middleware('auth'); //imprimir pdf


/*//FACTURACION
Route::get('/facturacion',[FacturacionController::class,'index'])->middleware('auth');
Route::get('/facturacion/asistente',[FacturacionController::class,'verAsistente'])->middleware('auth');
Route::get('/facturacion/nuevo',[FacturacionController::class,'create'])->middleware('auth');
Route::post('/facturacion/nuevo',[FacturacionController::class,'store'])->middleware('auth');
Route::get('/facturacion/editar/{id}',[FacturacionController::class,'edit'])->middleware('auth');
Route::post('/facturacion/editar/{id}',[FacturacionController::class,'update'])->middleware('auth');*/
//Route::post('/facturacion/verFacturas',[FacturacionController::class,'datosFacturas'])->middleware('auth'); //ruta tabla de facturas

//filelist
Route::post('/subirHtml/{id}',[ImagenController::class,'subirArchivo'])->name('elMilagro')->middleware('auth');//ruta para subir archivo a drive
Route::get('/trabajos/detalle/fileList/{id}',[ImagenController::class,'verFileList'])->middleware('auth');//FILE LIST
Route::get('/trabajos/detalle/fileList/descargar/{id}',[ImagenController::class,'descargarFileList'])->middleware('auth');//FILE LIST DONWLOAD
Route::delete('/trabajos/detalle/fileList/eliminar/{id}',[ImagenController::class,'eliminarFileList'])->middleware('auth');//FILE LIST DELETE

//IMAGEN
Route::post('/subirImagen/{id}',[ImagenController::class,'subirImagen'])->name('Imagen')->middleware('auth');//ruta para subir archivo a drive
Route::delete('/trabajos/detalle/fileImage/eliminar/{id}',[ImagenController::class,'eliminarFileImage'])->middleware('auth');//FILE LIST DELETE

//PRODUCTOS
Route::get('/productos',[ProductosController::class,'index'])->middleware('auth');
Route::get('/producto/nuevo',[ProductosController::class,'create'])->middleware('auth');
Route::post('/producto/nuevo',[ProductosController::class,'store'])->middleware('auth');
Route::get('/producto/editar/{id}',[ProductosController::class,'edit'])->middleware('auth');
Route::post('/producto/editar/{id}',[ProductosController::class,'update'])->middleware('auth');
Route::post('/producto/cambiarEstado',[ProductosController::class,'cambiarEstado'])->middleware('auth');
Route::post('/producto/moverDispositivo',[ProductosController::class,'moverDisp'])->middleware('auth');
Route::post('/producto/moverDispositivo',[ProductosController::class,'moverDisp'])->middleware('auth');
Route::delete('/producto/{id}',[ProductosController::class,'destroy'])->middleware('auth');

//CONFIGURACION
Route::get('/configuraciones',[ConfiguracionController::class,'index'])->middleware('auth');

//PRIORIDAD
Route::post('/configuracion/nuevaPrioridad',[PrioridadController::class,'nuevaPrioridad'])->middleware('auth');
Route::post('/configuracion/datosPrioridad',[PrioridadController::class,'datosPrioridad'])->middleware('auth');
Route::post('/configuracion/actualizarPrioridad',[PrioridadController::class,'actualizarPrioridad'])->middleware('auth');
Route::post('/configuracion/eliminarPrioridad',[PrioridadController::class,'eliminar'])->middleware('auth');

//DISPOSITIVO
Route::post('/configuracion/nuevoDispositivo',[DispositivoController::class,'nuevoDispositivo'])->middleware('auth');
Route::post('/configuracion/datosDispositivo',[DispositivoController::class,'datosDispositivo'])->middleware('auth');
Route::post('/configuracion/actualizarDispositivo',[DispositivoController::class,'actualizarDispositivo'])->middleware('auth');
Route::post('/configuracion/eliminarDispositivo',[DispositivoController::class,'eliminarDispositivo'])->middleware('auth');

//FABRICANTE
Route::post('/configuracion/nuevoFabricante',[FabricanteController::class,'nuevoFabricante'])->middleware('auth');
Route::post('/configuracion/datosFabricante',[FabricanteController::class,'datosFabricante'])->middleware('auth');
Route::post('/configuracion/actualizarFabricante',[FabricanteController::class,'actualizarFabricante'])->middleware('auth');
Route::post('/configuracion/eliminarFabricante',[FabricanteController::class,'eliminarFabricante'])->middleware('auth');

//TIPO DE DAÑO
Route::post('/configuracion/nuevoTipoDano',[MalFuncionamientoController::class,'nuevoTipoDaño'])->middleware('auth');
Route::post('/configuracion/datosTipoDano',[MalFuncionamientoController::class,'datosTipoDaño'])->middleware('auth');
Route::post('/configuracion/actualizarTipoDano',[MalFuncionamientoController::class,'actualizarTipoDaño'])->middleware('auth');
Route::post('/configuracion/eliminarTipoDano',[MalFuncionamientoController::class,'eliminarTipoDaño'])->middleware('auth');

//FACTOR DE FORMA
Route::post('/configuracion/nuevoFactor',[FactorFormaController::class,'nuevoFactor'])->middleware('auth');
Route::post('/configuracion/datosFactor',[FactorFormaController::class,'datosFactor'])->middleware('auth');
Route::post('/configuracion/actualizarFactor',[FactorFormaController::class,'actualizarFactor'])->middleware('auth');
Route::post('/configuracion/eliminarFactor',[FactorFormaController::class,'eliminarFactor'])->middleware('auth');

//TIPO DE CONEXION
Route::post('/configuracion/nuevoConexion',[TipoConexionController::class,'nuevoConexion'])->middleware('auth');
Route::post('/configuracion/datosConexion',[TipoConexionController::class,'datosConexion'])->middleware('auth');
Route::post('/configuracion/actualizarConexion',[TipoConexionController::class,'actualizarConexion'])->middleware('auth');
Route::post('/configuracion/eliminarConexion',[TipoConexionController::class,'eliminarConexion'])->middleware('auth');

//TIPO DE MONEDA
Route::post('/configuracion/nuevoValor',[TipoMonedaController::class,'nuevoValor'])->middleware('auth');
Route::post('/configuracion/datosValores',[TipoMonedaController::class,'datosValores'])->middleware('auth');
Route::post('/configuracion/actualizarValor',[TipoMonedaController::class,'actualizarValor'])->middleware('auth');
Route::post('/configuracion/eliminarValor',[TipoMonedaController::class,'eliminarValor'])->middleware('auth');
 
//LOG
Route::get('/sesion/log/{id}',[InicioSesionController::class,'show'])->middleware('auth');
Route::get('/historial/log/{id}',[HistorialController ::class,'show'])->middleware('auth');

/*Puede llamar a un comando de Artisan fuera de la CLI.
Route::get('/clear-cache', function() {
$exitCode = Artisan::call('cache:clear')->middleware('auth');
// return what you want
})->middleware('auth');*/  

Route::get('/send-mail', [MailController::class, 'index'])->middleware('auth');

//Route::get('storage_link', function(){
  //  Artisan::call('storage:link')->middleware('auth');
//})->middleware('auth');

Route::get('/foo', function () {
  Artisan::call('optimize:clear');
});
