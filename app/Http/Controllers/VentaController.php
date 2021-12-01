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

        $compras = Venta::all()->where('user_id', Auth::user()->id);


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
        $ruta = Ruta::find($itinerario->ruta_id);

        $total = 0;
        if($request->tipo == 0){
            $total = $request->cantidad * $itinerario->precio;
        }
        else{
            $total = $request->cantidad * $itinerario->precio_kilo;
        }

        $bill = [
            'itinerario_id' => $itinerario->id,
            'tipo' => $request->tipo,
            'cantidad' => $request->cantidad,
            'total' => $total,
            'fecha_venta' => date('Y-m-d'),
            'user_id' => Auth::user()->id,
            'descripcion' => $request->descripcion
        ];

        return view('venta.checkout', compact('bill', 'nave', 'ruta'));
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
