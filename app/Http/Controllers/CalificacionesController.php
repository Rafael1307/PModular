<?php

namespace App\Http\Controllers;

use App\Models\Calificaciones;
use Illuminate\Http\Request;
use App\Models\Materias;
use App\Models\Ciclos;
use App\Models\Trimestres;
use App\Models\Desgloce_Calificaciones;

class CalificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calificaciones = Calificaciones::with(['alumno', 'materia'])->get();

        return view('calificaciones.index', compact('calificaciones'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valida y guarda la calificación en la base de datos
        $request->validate([
            'alumno_id' => 'required|exists:alumnos,id',
            'maestro_id' => 'required|exists:maestros,id',
            'calificacion' => 'required|integer|min:0|max:100',
        ]);

        Calificaciones::create($request->all());

        return redirect()->route('calificaciones.index')->with('success', 'Calificación registrada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Calificaciones  $calificaciones
     * @return \Illuminate\Http\Response
     */
    public function show(Calificaciones $calificaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Calificaciones  $calificaciones
     * @return \Illuminate\Http\Response
     */
    public function edit(Calificaciones $calificaciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Calificaciones  $calificaciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calificaciones $calificaciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calificaciones  $calificaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calificaciones $calificaciones)
    {
        //
    }

    public function showEvaluarGrupo($materia_id)
    {
        $materia = Materias::findOrFail($materia_id);
        $grupo = $materia->grupo;
        $ciclo = $grupo->ciclo;
        $trimestres = Trimestres::where('id_ciclo', $ciclo->id)->get();


        return view('calificaciones.evaluartrimestre', compact('materia', 'trimestres'));
    }

    public function showGrupo(Request $request, $materia_id){

        $trimestre_id = $request->input('trimestre');
        $materia = Materias::findOrFail($materia_id);
        $grupo = $materia->grupo;
        $alumnos2 = $grupo->alumnos;

        foreach($alumnos2 as $alumno){
            $this->buscaCrea($alumno, $materia_id, $trimestre_id);
        }

        $alumnos = $grupo->alumnos;

        return view('calificaciones.calificartrimestre', compact('alumnos', 'materia', 'trimestre_id'));
    }

    public function buscaCrea($alumno, $materia_id, $trimestre_id){
        $calificaciones = $alumno->calificaciones;

            foreach($calificaciones as $calificacion){
                if($calificacion->id_trimestre == $trimestre_id){
                    if($calificacion->id_materia == $materia_id){ 
                        return 0;
                     }
                }
            }
        

        $nuevoDes = Calificaciones::create([
            'calificacion' => '0',
            'id_alumno' => $alumno->id,
            'id_materia' => $materia_id,
            'id_trimestre' => $trimestre_id,
        ]);

        return 0;
    }

    public function evaluarGrupo(Request $request, $materia_id)
    {
        // Lógica para evaluar el grupo y almacenar las calificaciones
        // ...

        return redirect()->route('desgloce_calificaciones.evaluar-grupo', ['materia_id' => $materia_id])->with('success', 'Grupo evaluado exitosamente.');
    }

    public function subirEvaluacion(Request $request, $materia_id, $trimestre_id){
        
            for ($i = 0; $i < count($request->id); $i++){
                $this->guardarCalificacion($request->id[$i], $request->calificacion[$i]);
            }

            $materia = Materias::findOrFail($materia_id);
            $grupo = $materia->grupo;
            $alumnos = $grupo->alumnos;

            return view('calificaciones.calificartrimestre', compact('alumnos', 'materia', 'trimestre_id'));
        
    }

    public function guardarCalificacion($calificacion_id, $calificacion){

        $registro = Calificaciones::findOrFail($calificacion_id);


        $registro->update([
            'calificacion' => $calificacion,
        ]);

        $registro;
    }
}
