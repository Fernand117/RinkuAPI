<?php

use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SalariosController;
use App\Http\Controllers\TipoSalariosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('roles', [RolesController::class, 'ListaRoles']);
Route::post('roles', [RolesController::class, 'RegistrarRol']);
Route::put('roles/{id}', [RolesController::class, 'EditarRol']);
Route::delete('roles/{id}', [RolesController::class, 'EliminarRol']);

Route::get('empleados', [EmpleadosController::class, 'ListaEmpleados']);
Route::post('empleados', [EmpleadosController::class, 'RegistrarEmpleado']);
Route::put('empleados/{id}', [EmpleadosController::class, 'EditarEmpleado']);
Route::delete('empleados/{id}', [EmpleadosController::class, 'EliminarEmpleado']);

Route::get('tipos', [TipoSalariosController::class, 'ListaTipoSalarios']);
Route::post('tipos', [TipoSalariosController::class, 'RegistrarTipoSueldo']);
Route::put('tipos/{id}', [TipoSalariosController::class, 'EditarTipoSueldo']);
Route::delete('tipos/{id}', [TipoSalariosController::class, 'EliminarTipoSueldo']);

Route::get('salarios', [SalariosController::class, 'ListaSalarios']);
Route::post('salarios', [SalariosController::class, 'RegistrarSalario']);
Route::put('salarios/{id}', [SalariosController::class, 'EditarSalario']);
Route::delete('salarios/{id}', [SalariosController::class, 'EliminarSalario']);