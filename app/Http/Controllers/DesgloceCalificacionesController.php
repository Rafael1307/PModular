<?php

namespace App\Http\Controllers;

use App\Models\Desgloce_Calificaciones;
use Illuminate\Http\Request;
use App\Models\Materias;
use App\Models\Ciclos;
use App\Models\Trimestres;

class DesgloceCalificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Desgloce_Calificaciones  $desgloce_Calificaciones
     * @return \Illuminate\Http\Response
     */
    public function show(Desgloce_Calificaciones $desgloce_Calificaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Desgloce_Calificaciones  $desgloce_Calificaciones
     * @return \Illuminate\Http\Response
     */
    public function edit(Desgloce_Calificaciones $desgloce_Calificaciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Desgloce_Calificaciones  $desgloce_Calificaciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Desgloce_Calificaciones $desgloce_Calificaciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Desgloce_Calificaciones  $desgloce_Calificaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Desgloce_Calificaciones $desgloce_Calificaciones)
    {
        //
    }


    public function showEvaluarGrupo($materia_id)
    {
        $materia = Materias::findOrFail($materia_id);
        $grupo = $materia->grupo;
        $ciclo = $grupo->ciclo;
        $trimestres = Trimestres::where('id_ciclo', $ciclo->id)->get();


        return view('desgloce_calificaciones.evaluartrimestre', compact('materia', 'trimestres'));
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

        return view('desgloce_calificaciones.calificartrimestre', compact('alumnos', 'materia', 'trimestre_id'));
    }

    public function buscaCrea($alumno, $materia_id, $trimestre_id){
        $desgloces = $alumno->desgloces;

            foreach($desgloces as $desgloce){
                if($desgloce->id_trimestre == $trimestre_id){
                    if($desgloce->id_materia == $materia_id){ 
                        return 0;
                     }
                }
            }
        

        $nuevoDes = Desgloce_Calificaciones::create([
            'actividades' => '0',
            'proyecto' => '0',
            'desempeno' => '0',
            'total' => '0',
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
                $this->guardarCalificacion($request->id[$i], $request->actividades[$i], $request->desempeno[$i], $request->proyecto[$i]);
            }

            $materia = Materias::findOrFail($materia_id);
            $grupo = $materia->grupo;
            $alumnos = $grupo->alumnos;

            return view('desgloce_calificaciones.calificartrimestre', compact('alumnos', 'materia', 'trimestre_id'));
        
    }

    public function guardarCalificacion($calificacion_id, $actividades, $desempeno, $proyecto){

        $registro = Desgloce_Calificaciones::findOrFail($calificacion_id);
        $act = intval($actividades);
        $des = intval($desempeno);
        $pro = intval($proyecto);
        $total = $act + $des + $pro;

        $registro->update([
            'actividades' => $act,
            'desempeno' => $des,
            'proyecto' => $pro,
            'total' => $total,
        ]);

        $registro;
    }
}
