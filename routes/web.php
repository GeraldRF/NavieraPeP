<?php

use App\Http\Controllers\ConfiguracionInicial;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ReservaController;

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

Route::post('configurar', [ConfiguracionInicial::class, "configurar"])->name('configurar');

Route::get('/', [HomeController::class, "index"]);

Route::get('viajes', [HomeController::class, "viajes"])->name('viajes');
Route::post('/filtrar', [HomeController::class, "filtrar"])->name('filtrar');
Route::post('/busqueda', [HomeController::class, "buscar"])->name('busqueda');
Route::middleware(['auth:sanctum', 'verified'])->get('ver/{id}', [HomeController::class, "ver"])->name('ver');

Route::middleware(['auth:sanctum', 'verified'])->get('mis-reservas', [ReservaController::class, "reservas"])->name('mis-reservas');
Route::middleware(['auth:sanctum', 'verified'])->get('mis-compras', [VentaController::class, "compras"])->name('mis-compras');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('Home.index');
// })->name('Home.index');

Route::get('iniciar-sesion', function () {
    return view('auth/login');
});

Route::get('registrarse', function () {
    return view('auth/register');
});
