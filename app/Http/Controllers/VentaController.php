<?php

namespace App\Http\Controllers;

use App\Models\Itinerario;
use App\Models\Venta;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ruta;
use App\Models\Nave;

class VentaController extends Controller
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

    public function compras()
    {

        $ventas = Venta::all()->where('user_id', Auth::user()->id);

        $compras = [];

        foreach ($ventas as $venta) {

            $itinerario = Itinerario::find($venta->itinerario_id);
            $ruta = Ruta::find($itinerario->ruta_id);

            $compra = [
                'id'=>$venta->id,
                'origen' => $ruta->origen,
                'destino' => $ruta->destino,
                'tipo' => $venta->tipo,
                'fecha_salida' => $itinerario->fecha_hora_salida,
                'fecha_compra' => $venta->fecha_venta,
                'cantidad' => $venta->cantidad,
                'total' => $venta->total,
                'descripcion' => $venta->descripcion
            ];

            $compras = array_merge($compras, [$compra]);
        }

        return view('venta.mis_compras', compact('compras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
                'fecha_venta' => date('Y-m-d H:i:s'),
                'user_id' => Auth::user()->id,
                'descripcion' => $request->descripcion
            ];

            return view('venta.checkout', compact('bill', 'nave', 'ruta'));
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
        Venta::create($request->all());

        $itinerario = Itinerario::find($request->itinerario_id);

        if ($request->tipo == 0) {
            $itinerario->update(['cant_pasajeros' => ($itinerario->cant_pasajeros + $request->cantidad)]);
        } else {
            $itinerario->update(['cant_carga' => ($itinerario->cant_carga + $request->cantidad)]);
        }

        return redirect()->route('mis-compras')->with(['success' => 'Su compra fue realizada con exito']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        //
    }

    public function imprimir(Request $compra){

        return view('venta.imprimir', compact('compra'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        //
    }
}
