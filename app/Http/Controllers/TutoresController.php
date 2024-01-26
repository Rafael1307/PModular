<?php

namespace App\Http\Controllers;

use App\Models\Tutores;
use Illuminate\Http\Request;

class TutoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tutores = Tutores::paginate();
        return view('tutores.index', compact('tutores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tutores.create');
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
            'apellido' => 'required',
            'correo' => 'required|email|unique:tutores',
            'telefono' => 'required',
        ]);

        Tutores::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
        ]);

        return redirect()->route('tutores.index')->with('success', 'Tutor creado exitosamente.');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tutores  $tutores
     * @return \Illuminate\Http\Response
     */
    public function show(Tutores $tutor)
    {
        return view('tutores.show', compact('tutor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tutores  $tutores
     * @return \Illuminate\Http\Response
     */
    public function edit(Tutores $tutor)
    {
        return view('tutores.edit', compact('tutor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tutores  $tutores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tutores $tutor)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required|email|unique:tutores,correo,' . $tutor->id,
            'telefono' => 'required',
        ]);

        $tutor->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
        ]);

        return redirect()->route('tutores.index')->with('success', 'Tutor actualizado exitosamente.');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tutores  $tutores
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tutores $tutores)
    {
        $tutores->delete();
        return redirect()->route('maestros.index')->with('success', 'Maestro eliminado exitosamente');
    }
}
