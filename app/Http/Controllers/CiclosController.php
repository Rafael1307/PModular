<?php

namespace App\Http\Controllers;

use App\Models\Ciclos;
use Illuminate\Http\Request;

class CiclosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciclos = Ciclos::paginate();
        return view('ciclos.index', compact('ciclos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ciclos.create');
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
            'ciclo' => 'required|unique:ciclos',
        ]);

        Ciclos::create([
            'ciclo' => $request->input('ciclo'),
        ]);

        return redirect()->route('ciclos.index')->with('success', 'Ciclo creado exitosamente.');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ciclos  $ciclos
     * @return \Illuminate\Http\Response
     */
    public function show(Ciclos $ciclo)
    {
        
        return view('ciclos.show', compact('ciclo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ciclos  $ciclos
     * @return \Illuminate\Http\Response
     */
    public function edit(Ciclos $ciclo)
    {
        return view('ciclos.edit', compact('ciclo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ciclos  $ciclos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ciclos $ciclo)
    {
        $request->validate([
            'ciclo' => 'required',
        ]);

        $ciclo->update([
            'ciclo' => $request->input('ciclo'),
        ]);

        return redirect()->route('ciclos.index')->with('success', 'Ciclo actualizado exitosamente.');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ciclos  $ciclos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ciclo = Ciclos::find($id);
        $ciclo->delete();

        return redirect()->route('ciclos.index')->with('success', 'Ciclo eliminado exitosamente.');
    
    }
}
