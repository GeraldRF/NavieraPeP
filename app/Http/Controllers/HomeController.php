<?php

namespace App\Http\Controllers;

use App\Models\ConfiguracionInicial;
use App\Models\Itinerario;
use App\Models\Nave;
use App\Models\Ruta;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {

        $config = [];
        $conf = false;
        $config = ConfiguracionInicial::all();
        if (count($config) == 0) {
            return view('configuracion', compact('conf'));
        } else {
            return view('Home.index');
        }
    }

    public function viajes()
    {

        $viajes = [];
        $itinerarios = Itinerario::all();

        foreach ($itinerarios as $itinerario) {
            if (date('Y-m-d H:i:S') < $itinerario->fecha_hora_salida) {

                $nave = Nave::find($itinerario->nave_id);
                if ($itinerario->cant_pasajeros != $nave->cap_pasajeros && $itinerario->cant_carga != $nave->cap_carga) {
                    $ruta = Ruta::find($itinerario->ruta_id);
                    $fecha = $itinerario->fecha_hora_salida;

                    $fechadiv = explode(' ', $fecha);

                    $viajes = array_merge($viajes, [[
                        'itinerario_id' => $itinerario->id,
                        'origen' => $ruta->origen,
                        'destino' => $ruta->destino,
                        'fecha' => $fechadiv[0],
                        'hora' => $fechadiv[1],
                        'precio' => $itinerario->precio,
                        'cap_carga' => $nave->cap_carga,
                        'cap_pasajeros' => $nave->cap_pasajeros,
                        'vend_carga' => $itinerario->cant_carga,
                        'vend_pasajeros' => $itinerario->cant_pasajeros,
                    ]]);
                }
            }
        }

        return view('Home.viajes', compact('viajes'));
    }

    public function ver($id)
    {

        $itinerario = Itinerario::find($id);
        $ruta = Ruta::find($itinerario['ruta_id']);
        $nave = Nave::find($itinerario['nave_id']);

        return view('Home.ver', compact('nave', 'ruta', 'itinerario'));
    }

    public function filtrar(Request $filtro)
    {
        $viajes = [];
        $itinerarios = Itinerario::all();

        foreach ($itinerarios as $itinerario) {
            if (date('Y-m-d H:i:S') < $itinerario->fecha_hora_salida) {
                $nave = Nave::find($itinerario->nave_id);
                if ($itinerario->cant_pasajeros != $nave->cap_pasajeros && $itinerario->cant_carga != $nave->cap_carga) {
                    $ruta = Ruta::find($itinerario->ruta_id);


                    $fecha = $itinerario->fecha_hora_salida;

                    $fechadiv = explode(' ', $fecha);
                    //Antes del merge convertir a array paraz

                    $viaje = [
                        'itinerario_id' => $itinerario->id,
                        'origen' => $ruta->origen,
                        'destino' => $ruta->destino,
                        'fecha' => $fechadiv[0],
                        'hora' => $fechadiv[1],
                        'precio' => $itinerario->precio,
                        'cap_carga' => $nave->cap_carga,
                        'cap_pasajeros' => $nave->cap_pasajeros,
                        'vend_carga' => $itinerario->cant_carga,
                        'vend_pasajeros' => $itinerario->cant_pasajeros,
                    ];

                    $esta = 1;
                    if ($filtro['fecha'] != '')
                        if ($filtro['fecha'] != $viaje['fecha'])  $esta = 0;
                    if ($filtro['origen'] != '')
                        if ($filtro['origen'] != $viaje['origen'])  $esta = 0;
                    if ($filtro['destino'] != '')
                        if ($filtro['destino'] != $viaje['destino'])  $esta = 0;
                    if ($filtro['precio'] != '')
                        if ($filtro['precio'] < $viaje['precio'])  $esta = 0;

                    if ($esta == 1) {
                        $viajes = array_merge($viajes, [$viaje]);
                    }
                }
            }
        }

        return view('Home.viajes', compact('viajes'));
    }
    public function buscar(Request $busqueda)
    {
        $viajes = [];
        $itinerarios = Itinerario::all();

        foreach ($itinerarios as $itinerario) {
            if (date('Y-m-d H:i:S') < $itinerario->fecha_hora_salida) {
                $nave = Nave::find($itinerario->nave_id);
                if ($itinerario->cant_pasajeros != $nave->cap_pasajeros && $itinerario->cant_carga != $nave->cap_carga) {
                    $ruta = Ruta::find($itinerario->ruta_id);


                    $fecha = $itinerario->fecha_hora_salida;

                    $fechadiv = explode(' ', $fecha);
                    //Antes del merge convertir a array paraz

                    $viaje = [
                        'itinerario_id' => $itinerario->id,
                        'origen' => $ruta->origen,
                        'destino' => $ruta->destino,
                        'fecha' => $fechadiv[0],
                        'hora' => $fechadiv[1],
                        'precio' => $itinerario->precio,
                        'cap_carga' => $nave->cap_carga,
                        'cap_pasajeros' => $nave->cap_pasajeros,
                        'vend_carga' => $itinerario->cant_carga,
                        'vend_pasajeros' => $itinerario->cant_pasajeros,
                    ];

                    $esta = 1;
                    if ($busqueda['buscar'] != '')
                        if ($busqueda['buscar'] != $viaje['origen'] . ' - ' . $viaje['destino'])  $esta = 0;

                    if ($esta == 1) {
                        $viajes = array_merge($viajes, [$viaje]);
                    }
                }
            }
        }

        return view('Home.viajes', compact('viajes'));
    }
}
