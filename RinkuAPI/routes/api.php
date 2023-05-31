<?php

use App\Http\Controllers\RolesController;
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
