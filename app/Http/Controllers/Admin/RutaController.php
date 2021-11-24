<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ruta;

use function GuzzleHttp\Promise\all;

class RutaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rutas = Ruta::all();

        return view('admin.ruta.index', compact('rutas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ruta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'origen' => 'required',
            'destino' => 'required'
        ]);

        Ruta::create($request->all());

        $origen = $request -> origen;
        $destino = $request -> destino;

        return redirect() -> route('admin.rutas.index')->with(['success' => 'Se agrego la ruta "'. $origen.' - '.$destino.'" correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ruta $ruta)
    {
        return view('admin.rutas.show', compact('ruta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ruta $ruta)
    {
        return view('admin.ruta.edit', compact('ruta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ruta $ruta)
    {
        $request->validate([
            'origen' => 'required',
            'destino' => 'required'
        ]);

        $origen1 = $ruta -> origen;
        $destino1 = $ruta -> destino;

        $origen2 = $request -> origen;
        $destino2 = $request -> destino;

        $ruta -> update($request -> all());

        return redirect() -> route('admin.rutas.index')->with(['success' => 'Se actualizo la ruta "'. $origen1.' - '.$destino1.'" por "'. $origen2.' - '.$destino2.'" correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ruta $ruta)
    {
        $origen = $ruta -> origen;
        $destino = $ruta -> destino;

        $ruta -> delete();

        return redirect() -> route('admin.rutas.index')->with(['success' => 'Se elimino la ruta "'. $origen.' - '.$destino.'" correctamente']);
    }
}
