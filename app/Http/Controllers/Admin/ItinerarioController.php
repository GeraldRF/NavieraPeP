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
        $naves = Nave::all();
        $rutas = Ruta::all();
        $itinerarios = Itinerario::all();
        return view('admin.itinerario.index', compact('itinerarios', 'rutas', 'naves'));
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
        $request->validate([
            'fecha_hora_llegada' => ['required', 'regex:/([12]\d{3})-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]) (0[1-9]|1[0-9]|2[0-4]):(0[0-9]|[1-5][0-9])(:(0[1-9]|[1-5][0-9])|)/'],
            'fecha_hora_salida' => ['required', 'regex:/([12]\d{3})-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]) (0[1-9]|1[0-9]|2[0-4]):(0[0-9]|[1-5][0-9])(:(0[1-9]|[1-5][0-9])|)/'],
            'ruta_id' => ['required', 'integer'],
            'nave_id' => ['required','integer'],
            'precio' => ['required','integer']
        ]);

        Itinerario::create($request -> all());

        return redirect() -> route('admin.itinerarios.index')->with(['success' => 'Se agrego el itinerario correctamente.']);
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
        return view('admin.itinerario.edit', compact('itineario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Itinerario $itinerario)
    {
        $request->validate([
            'fecha_hora_llegada' => ['required', 'regex:/([12]\d{3})-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]) (0[1-9]|1[0-9]|2[0-4]):(0[0-9]|[1-5][0-9])(:(0[1-9]|[1-5][0-9])|)/'],
            'fecha_hora_salida' => ['required', 'regex:/([12]\d{3})-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]) (0[1-9]|1[0-9]|2[0-4]):(0[0-9]|[1-5][0-9])(:(0[1-9]|[1-5][0-9])|)/'],
            'ruta_id' => ['required', 'integer'],
            'nave_id' => ['required','integer'],
            'precio' => ['required','integer']
        ]);

        $itinerario -> update($request -> all());

        return redirect() -> route('admin.itinerarios.index')->with(['success' => 'Se edito el itinerario correctamente.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Itinerario $itinerario)
    {
        $itinerario -> delete();
        return redirect() -> route('admin.itinerarios.index')->with(['success' => 'Se elimino el itineriario correctamente']);
    }
}
