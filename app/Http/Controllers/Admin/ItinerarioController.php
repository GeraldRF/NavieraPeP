<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Itinerario;
use App\Models\Ruta;
use App\Models\Nave;

class ItinerarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itinerarios = Itinerario::all();
        return view('admin.itinerario.index', compact('itinerarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rutas = ['' => ''];
        foreach (Ruta::all() as $ruta) {
            $rutas+= [$ruta->id => $ruta->origen.'-'.$ruta -> destino];
        }

        $naves = ['' => ''];
        foreach (Nave::all() as $nave) {
            $naves += [$nave->id => $nave->nombre.'-'.$nave -> cap_personas.'-'.$nave -> cap_rutas];
        }


        return view('admin.itinerario.create', compact('rutas', 'naves'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Itinerario $itineario)
    {
        return view('admin.itinerario.show', compact('itinerario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Itinerario $itineario)
    {
        return view('admin.itinerario.edit', compact('itinerario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Itinerario $itineario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Itinerario $itineario)
    {
        //
    }
}
