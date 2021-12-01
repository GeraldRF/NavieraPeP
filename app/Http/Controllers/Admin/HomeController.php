<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Itinerario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Nave;
use App\Models\Ruta;
use App\Models\Venta;
use App\Models\Reserva;

class HomeController extends Controller
{
    public function index(){
         if(Auth::user()->roll != 2){
            return "Acceso denegado";
         }else{
            return view('admin.index'); 
         }
    }

    public function informe_estadistica(){

        $itinerarios = Itinerario::all();
        $naves = Nave::all();
        $rutas = Ruta::all();
        $ventas = Venta::all();
        $reservas = Reserva::all();

        return view('admin.informes.informe_estadistica', compact('itinerarios', 'naves', 'rutas', 'ventas', 'reservas')); 
    }
    public function informe_ingresos(){

        $itinerarios = Itinerario::all();
        $naves = Nave::all();
        $rutas = Ruta::all();
        $ventas = Venta::all();
        $reservas = Reserva::all();

        return view('admin.informes.informe_ingresos', compact('itinerarios', 'naves', 'rutas', 'ventas', 'reservas')); 
    }
}
