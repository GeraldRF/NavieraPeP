<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, "index"]);
Route::post('/filtrar', [HomeController::class, "filtrar"])->name('filtrar');
Route::post('/busqueda', [HomeController::class, "buscar"])->name('busqueda');
Route::get('ver/{id}', [HomeController::class, "ver"])->name('ver');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('Home.index');
// })->name('Home.index');

Route::get('iniciar-sesion', function () {
    return view('auth/login');
});

Route::get('registrarse', function () {
    return view('auth/register');
});
