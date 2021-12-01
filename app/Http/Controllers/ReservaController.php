<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;
use App\Models\Itinerario;
use App\Models\Nave;
use App\Models\Ruta;
use Illuminate\Support\Facades\Auth;
use Livewire\Macros\ViewMacros;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function reservas()
    {
        $reserves = Reserva::all()->where('user_id', Auth::user()->id);
        $reservas = [];

        foreach ($reserves as $reserva) {

            $itinerario = Itinerario::find($reserva->itinerario_id);
            $ruta = Ruta::find($itinerario->ruta_id);

            $reserva = [
                'id' => $reserva->id,
                'itinerario_id' => $itinerario->id,
                'origen' => $ruta->origen,
                'destino' => $ruta->destino,
                'tipo' => $reserva->tipo,
                'fecha_salida' => $itinerario->fecha_hora_salida,
                'fecha_reserva' => $reserva->fecha_reserva,
                'cantidad' => $reserva->cantidad,
                'total' => $reserva->total,
                'descripcion' => $reserva->descripcion,
                'cancelado' => $reserva->cancelado,
            ];

            $reservas = array_merge($reservas, [$reserva]);
        }

        return view('reserva.mis_reservas', compact('reservas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'cantidad' => 'required',
        ]);
        $itinerario = Itinerario::find($request->itinerario_id);
        $nave = Nave::find($itinerario->nave_id);

        if ($request->cantidad >= 1 && $request->cantidad <= ($request->tipo == 0 ? $nave->cap_pasajeros - $itinerario->cant_pasajeros  : $nave->cap_carga - $itinerario->cant_carga)) {

            $ruta = Ruta::find($itinerario->ruta_id);

            $total = 0;
            if ($request->tipo == 0) {
                $total = $request->cantidad * $itinerario->precio;
            } else {
                $total = $request->cantidad * $itinerario->precio_kilo;
            }

            $bill = [
                'itinerario_id' => $itinerario->id,
                'tipo' => $request->tipo,
                'cantidad' => $request->cantidad,
                'total' => $total,
                'fecha_reserva' => date('Y-m-d H:i:s'),
                'user_id' => Auth::user()->id,
                'descripcion' => $request->descripcion,
                'fecha_salida' => $itinerario->fecha_hora_salida
            ];

            return view('reserva.checkout', compact('bill', 'nave', 'ruta'));
        } else {
            $tipo = $request->tipo == 0 ? 'pasajes' : 'kilos';
            return redirect()->route('ver', $itinerario->id)->with(['success' => 'La cantidad de ' . $tipo . ' ingresada no esta en el rango disponible']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Reserva::create($request->all());

        $itinerario = Itinerario::find($request->itinerario_id);

        if ($request->tipo == 0) {
            $itinerario->update(['cant_pasajeros' => ($itinerario->cant_pasajeros + $request->cantidad)]);
        } else {
            $itinerario->update(['cant_carga' => ($itinerario->cant_carga + $request->cantidad)]);
        }

        return redirect()->route('mis-reservas')->with(['success' => 'Su reserva fue realizada con exito']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function show(Reserva $reserva)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function edit(Reserva $reserva)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reserva $reserva)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reserva $reserva)
    {
    }

    public function renunciar(Request $request)
    {
        $reserva = Reserva::find($request['id']);

        $reserva->delete();

        $itinerario = Itinerario::find($request->itinerario_id);
        if ($request['tipo'] == 0) {
            $itinerario->update(['cant_pasajeros' => $itinerario->cant_pasajeros - $request['cantidad']]);
        }else{
            $itinerario->update(['cant_carga' => $itinerario->cant_carga - $request['cantidad']]);
        }

        return redirect()->route('mis-reservas');
    }

    public function pagar(Request $request)
    {
    }
}
