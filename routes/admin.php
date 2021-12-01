<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NaveController;
use App\Http\Controllers\Admin\RutaController;
use App\Http\Controllers\Admin\ItinerarioController;
use App\Http\Controllers\Admin\CajeroController;

Route::get('/', [HomeController::class, 'index'])->name('admin');
Route::resource('naves', NaveController::class, ['parameters' => [
    'naves' => 'nave'
]])->names('admin.naves');
Route::resource('rutas', RutaController::class)->names('admin.rutas');
Route::resource('itinerarios', ItinerarioController::class, ['parameters' => [
    'itinerarios' => 'itinerario'
]])->names('admin.itinerarios');
Route::resource('cajeros', CajeroController::class)->names('admin.cajeros');
Route::get('generar-informe-estadisticas', [HomeController::class, 'informe_estadistica'])->name('generar-informe-estadisticas');
Route::get('generar-informe-ingresos', [HomeController::class, 'informe_ingresos'])->name('generar-informe-ingresos');