<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\OrdenTrabajoController;
use App\Http\Controllers\RolesController;
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

//ROLES
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
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

//ORDEN DE TRABAJO
Route::get('/trabajos',[OrdenTrabajoController::class,'index']);
Route::get('/trabajo/nuevo',[OrdenTrabajoController::class,'create']);
Route::post('/trabajo/nuevo',[OrdenTrabajoController::class,'store']);
Route::get('/trabajo/editar/{id}',[OrdenTrabajoController::class,'edit']);
Route::post('/trabajo/editar/{id}',[OrdenTrabajoController::class,'update']);

//INVENTARIO
Route::get('/inventario',[InventarioController::class,'index']);
Route::get('/inventario/nuevo',[InventarioController::class,'create']);
Route::post('/inventario/nuevo',[InventarioController::class,'store']);
Route::get('/inventario/editar/{id}',[InventarioController::class,'edit']);
Route::post('/inventario/editar/{id}',[InventarioController::class,'update']);

//CLIENTES
Route::get('/clientes',[ClienteController::class,'index']);
Route::get('/cliente/nuevo',[ClienteController::class,'create']);
Route::post('/cliente/nuevo',[ClienteController::class,'store']);
Route::get('/cliente/editar/{id}',[ClienteController::class,'edit']);
Route::post('/cliente/editar/{id}',[ClienteController::class,'update']);
