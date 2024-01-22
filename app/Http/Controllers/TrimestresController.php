<?php

namespace App\Http\Controllers;

use App\Models\Trimestres;
use Illuminate\Http\Request;
use App\Models\Ciclos;

class TrimestresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_ciclo)
    {
        $ciclo = Ciclos::findOrFail($id_ciclo);
        return view('ciclos.show', compact('ciclo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

  


    public function create($id_ciclo)
    {
        // Obtener el ciclo actual
        $ciclo = Ciclos::findOrFail($id_ciclo);

        return view('trimestres.create', compact('ciclo'));
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
            'trimestre' => 'required',
        ]);

        Trimestres::create([
            'trimestre' => $request->input('trimestre'),
            'id_ciclo' => $request->input('id_ciclo'),
        ]);

        $id_ciclo = $request->input('id_ciclo');
        

        return redirect()->route('trimestres.index',[$id_ciclo])->with('success', 'Trimestre creado exitosamente.');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trimestres  $trimestres
     * @return \Illuminate\Http\Response
     */
    public function show(Trimestres $trimestre)
    {
        return view('trimestres.show', compact('trimestre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trimestres  $trimestres
     * @return \Illuminate\Http\Response
     */
    public function edit(Trimestres $trimestre)
    {
        return view('trimestres.edit', compact('trimestre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trimestres  $trimestres
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trimestres $trimestre)
    {
        $request->validate([
            'trimestre' => 'required',
        ]);

        $trimestre->update([
            'trimestre' => $request->input('trimestre'),
        ]);

        $id_ciclo = $trimestre->id_ciclo;
        
        return redirect()->route('trimestres.index',[$id_ciclo])->with('success', 'Trimestre actualizado exitosamente.');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trimestres  $trimestres
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trimestres $trimestre)
    {
        $id_ciclo = $trimestre->id_ciclo;

        $trimestre->delete();
        

        return redirect()->route('trimestres.index',[$id_ciclo])->with('success', 'Trimestre eliminado exitosamente.');
    
    }
}
