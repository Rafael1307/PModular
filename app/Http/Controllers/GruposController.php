<?php

namespace App\Http\Controllers;

use App\Models\Grupos;
use Illuminate\Http\Request;
use App\Models\Ciclos;
use App\Models\Maestros;
use App\Models\Alumnos;
use App\Models\Materias;
use App\Models\Trimestres;

class GruposController extends Controller
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

        $maestros = Maestros::all();
        return view('grupos.create', compact(['ciclo', 'maestros']));
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
            'grupo' => 'required',
            'grado' => 'required',
            'turno' => 'required',
            'id_asesor' => 'required',
            'id_ciclo' => 'required',
        ]);

        Grupos::create($request->all());

        $id_ciclo = $request->input('id_ciclo');

        return redirect()->route('grupos.index',[$id_ciclo])->with('success', 'Grupo creado exitosamente.');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grupos  $grupos
     * @return \Illuminate\Http\Response
     */
    public function show(Grupos $grupo)
    {
        $alumnos = Alumnos::where('id_grupo', $grupo->id)->get();

        return view('grupos.show', compact('grupo', 'alumnos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grupos  $grupos
     * @return \Illuminate\Http\Response
     */
    public function edit(Grupos $grupo)
    {
        $maestros = Maestros::all();
        return view('grupos.edit', compact(['grupo', 'maestros']));
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grupos  $grupos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grupos $grupo)
    {
        $request->validate([
            'grupo' => 'required',
            'grado' => 'required',
        ]);

        $grupo->update([
            'grupo' => $request->input('grupo'),
            'grado' => $request->input('grado'),
            'turno' => $request->input('turno'),
            'id_asesor' => $request->input('id_asesor'),
        ]);

        $id_ciclo = $grupo->id_ciclo;
        

        return redirect()->route('grupos.index',[$id_ciclo])->with('success', 'Grupo actualizado exitosamente.');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grupos  $grupos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grupos $grupo)
    {

        $id_ciclo = $grupo->id_ciclo;

        $grupo->delete();

        return redirect()->route('grupos.index',[$id_ciclo])->with('success', 'Grupo eliminado exitosamente.');
  
    }

    public function indexm(Materias $materia){

        
        $materiasList = $this->getMateriasList();
        return view('grupos.indexm', compact('materia', 'materiasList'));
    }

    public function showTrimestre($grupo_id){
        $grupo = Grupos::where('id', $grupo_id)->first();
        $id_ciclo = $grupo->id_ciclo;

        $trimestres = Trimestres::where('id_ciclo', $id_ciclo)->get();
        return view('grupos.showtrimestregrupo', compact('grupo', 'trimestres'));

    }

    public function showCalificaciones(Request $request, Grupos $grupo){

        $trimestre_id = $request->input('trimestre');
      
        $materias = $grupo->materias()->orderBy('materia')->get();
        $alumnos = $grupo->alumnos()->orderBy('apellido')->get();


        $materiasList = $this->getMateriasList();
        


        return view('grupos.showcalificacionesgrupo', compact('grupo','trimestre_id', 'materias', 'alumnos', 'materiasList'));
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
