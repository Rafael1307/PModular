<?php

namespace App\Http\Controllers;

use App\Models\Sis_Grupos;
use Illuminate\Http\Request;
use App\Models\Ciclos;
use App\Models\Maestros;
use App\Models\Alumnos;

class SisGruposController extends Controller
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

        
        $ciclo = Ciclos::findOrFail($id_ciclo);

        $maestros = Maestros::all();
        return view('sis_grupos.create', compact(['ciclo', 'maestros']));
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
            'grupo' => 'required|unique:sis_grupos',
            'id_ciclo' => 'required',
        ]);

        Sis_Grupos::create($request->all());

        $id_ciclo = $request->input('id_ciclo');

        return redirect()->route('sis_grupos.index',[$id_ciclo])->with('success', 'Grupo del Sistema creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sis_Grupos  $sis_Grupos
     * @return \Illuminate\Http\Response
     */
    public function show(Sis_Grupos $sisGrupo)
    {
        $alumnos = Alumnos::where('id_grupo', $sisGrupo->id)->get();
        return view('sis_grupos.show', compact('sisGrupo', 'alumnos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sis_Grupos  $sis_Grupos
     * @return \Illuminate\Http\Response
     */
    public function edit(Sis_Grupos $sisGrupo)
    {

        $maestros = Maestros::all();
        return view('sis_grupos.edit', compact(['sisGrupo', 'maestros']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sis_Grupos  $sis_Grupos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sis_Grupos $sisGrupo)
    {
        $request->validate([
            'grupo' => 'required',
        ]);

        $sisGrupo->update([
            'grupo' => $request->input('grupo'),
        ]);

        $id_ciclo = $sisGrupo->id_ciclo;

        return redirect()->route('sis_grupos.index',[$id_ciclo])->with('success', 'Grupo del Sistema actualizado exitosamente.');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sis_Grupos  $sis_Grupos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sis_Grupos $sisGrupo)
    {

        $id_ciclo = $sisGrupo->id_ciclo;
        $sisGrupo->delete();

        return redirect()->route('sis_grupos.index',[$id_ciclo])->with('success', 'Grupo del Sistema eliminado exitosamente.');
    }
}
