<?php

namespace App\Http\Controllers;

use App\Models\Materias;
use Illuminate\Http\Request;
use App\Models\Ciclos;
use App\Models\Grupos;
use App\Models\Maestros;

class MateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materiasList = $this->getMateriasList();

        $materias = Materias::paginate();
        return view('materias.index', compact('materias', 'materiasList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materiasList = $this->getMateriasList();
        $grupos = Grupos::all();
        $maestros = Maestros::all();
        $cicloActual = Ciclos::latest('id')->first();


        return view('materias.create', compact('materiasList', 'grupos', 'maestros', 'cicloActual'));
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
            'materia' => 'required',
            'grupo_id' => 'required',
            'maestro_id' => 'required',
            // Añade validaciones adicionales según sea necesario
        ]);

        Materias::create([
            'materia' => $request->input('materia'),
            'id_grupo' => $request->input('grupo_id'),
            'id_maestro' => $request->input('maestro_id'),
            // Añade otros campos según sea necesario
        ]);

        return redirect()->route('materias.index')->with('success', 'Materia creada exitosamente.');
  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materias  $materias
     * @return \Illuminate\Http\Response
     */
    public function show(Materias $materia)
    
    {
        $materiasList = $this->getMateriasList();

        return view('materias.show', compact('materia', 'materiasList'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materias  $materias
     * @return \Illuminate\Http\Response
     */
    public function edit(Materias $materia)
    {
        $grupos = Grupos::all();
        $maestros = Maestros::all();
        $cicloActual = Ciclos::latest('id')->first();
        $materiasList = $this->getMateriasList();
        return view('materias.edit', compact('materia', 'materiasList', 'grupos', 'maestros', 'cicloActual'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materias  $materias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materias $materia)
    {
        $request->validate([
            'materia' => 'required',
            'grupo_id' => 'required',
            'maestro_id' => 'required',
            // Añade validaciones adicionales según sea necesario
        ]);

        $materia->update([
            'materia' => $request->input('materia'),
            'grupo_id' => $request->input('grupo_id'),
            'maestro_id' => $request->input('maestro_id'),
            // Añade otros campos según sea necesario
        ]);

        return redirect()->route('materias.index')->with('success', 'Materia actualizada exitosamente.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materias  $materias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materias $materia)
    {
        $materia->delete();

        return redirect()->route('materias.index')->with('success', 'Materia eliminada exitosamente.');
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
