<?php

namespace App\Http\Controllers;

use App\Models\Sis_Grupos;
use Illuminate\Http\Request;
use App\Models\Ciclos;
use App\Models\Maestros;
use App\Models\Alumnos;
use App\Models\Trimestres;

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

    public function showTrimestre(Sis_Grupos $sisGrupo){

        $ciclo = $sisGrupo->ciclo;
        $trimestres = Trimestres::where('id_ciclo', $ciclo->id)->get();
        return view('sis_grupos.showtrimestregrupo', compact('sisGrupo', 'trimestres'));

    }

    public function showCalificaciones(Request $request, Sis_Grupos $sisGrupo){

        $trimestre_id = $request->input('trimestre');
        $alumnopb = $sisGrupo->alumnos->first();
        $grupopb = $alumnopb->grupo;
        $materias = $grupopb->materias()->orderBy('materia')->get();
        $alumnos = $sisGrupo->alumnos()->orderBy('apellido')->get();


        $materiasList = $this->getMateriasList();


        return view('sis_grupos.showcalificacionesgrupo', compact('sisGrupo','trimestre_id', 'materias', 'alumnos', 'materiasList'));
    }

    private function getMateriasList()
    {
        return [
            '11' => 'Español',
            '12' => 'Ingles',
            '13' => 'Artes',
            '21' => 'Matematicas',
            '22' => 'Biologia',
            '23' => 'Fisica',
            '24' => 'Quimica',
            '31' => 'Geografia',
            '32' => 'Historia',
            '33' => 'Formacion Civica y Etica',
            '41' => 'Tecnologia',
            '42' => 'Educacion Fisica',
            '43' => 'Socioemocional',
            '51' => 'Creatividad',
            '52' => 'Performance',
            '53' => 'FRyS',
        ];
    }
}
