<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NaveController;
use App\Http\Controllers\Admin\RutaController;
use App\Http\Controllers\Admin\ItinerarioController;

Route::get('', [HomeController::class, 'index']);
Route::resource('naves', NaveController::class, ['parameters' => [
    'naves' => 'nave'
]])->names('admin.naves');
Route::resource('rutas', RutaController::class)->names('admin.rutas');
Route::resource('itinerarios', ItinerarioController::class)->names('admin.itinerarios');
Route::get('generar-informe-estadistica', [HomeController::class, 'informe_estadistica']);