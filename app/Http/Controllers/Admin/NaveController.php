<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nave;

use function GuzzleHttp\Promise\all;

class NaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $naves = Nave::all();

        return view('admin.nave.index', compact('naves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.nave.create');
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
            'nombre' => 'required',
            'cap_pasajeros' => ['required', 'integer'],
            'cap_carga' => ['required','integer']
        ]);

        Nave::create($request -> all());

        return redirect() -> route('admin.naves.index')->with(['success' => 'Se agrego la nave "'. $request->nombre . '" correctamente.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Nave $nave)
    {
        return view('admin.nave.show', compact('nave'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Nave $nave)
    {
        return view('admin.nave.edit', compact('nave'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nave $nave)
    {
        $request->validate([
            'nombre' => 'required',
            'cap_pasajeros' => ['required', 'integer'],
            'cap_carga' => ['required','integer']
        ]);

        $nave -> update($request -> all());

        return redirect() -> route('admin.naves.index')->with(['success' => 'Se actualizo la nave correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nave $nave)
    {
        
        $nom = $nave -> nombre;

        $nave -> delete();
        return redirect() -> route('admin.naves.index')->with(['success' => 'Se elimino la ruta "'. $nom .'" correctamente']);
    }
}
