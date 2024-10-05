<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Alumnos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Grupos;
use App\Models\Calificaciones;
use App\Models\Sis_Grupos;
use App\Models\Notas;

class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumnos::orderBy('apellido')->get();
        return view('alumnos.index', compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sisGrupos = Sis_Grupos::all();
        $grupos = Grupos::all();
        return view('alumnos.create', compact('grupos', 'sisGrupos'));
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
            'correo' => 'required|email',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_grupo' => 'required',
        ]);

        // Subir la foto y obtener la ruta
        $fotoPath = $request->file('foto')->store('uploads', 'public');

        Alumnos::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'correo' => $request->correo,
            'foto' => $fotoPath,
            'id_grupo' => $request->id_grupo,
            'id_sis' => $request->id_sis,
        ]);

        return redirect()->route('alumnos.index')->with('success', 'Alumno creado exitosamente.');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function show(Alumnos $alumno)
    {
        $alumno->load('tutores');
        return view('alumnos.show', compact('alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumnos $alumno)
    {
        $sisGrupos = Sis_Grupos::all();
        $grupos = Grupos::all();
        return view('alumnos.edit', compact('alumno', 'grupos', 'sisGrupos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumnos $alumno)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required|email',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'id_grupo' => 'required',
        ]);

        // Actualizar la foto si se proporciona
        if ($request->hasFile('foto')) {
            // Eliminar la foto anterior
            Storage::disk('public')->delete($alumno->foto);

            // Subir la nueva foto y obtener la ruta
            $fotoPath = $request->file('foto')->store('uploads', 'public');
        } else {
            // Mantener la foto actual si no se proporciona una nueva
            $fotoPath = $alumno->foto;
        }

        $alumno->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'correo' => $request->correo,
            'foto' => $fotoPath,
            'id_grupo' => $request->id_grupo,
            'id_sis' => $request->id_sis,
        ]);

        return redirect()->route('alumnos.index')->with('success', 'Alumno actualizado exitosamente.');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumnos $alumno)
    {
        // Eliminar la foto asociada
        Storage::disk('public')->delete($alumno->foto);

        $alumno->delete();

        return redirect()->route('alumnos.index')->with('success', 'Alumno eliminado exitosamente.');
    
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

public function getNombreMateria($codigo)
{
    $materias = $this->getMateriasList();
    return $materias[$codigo] ?? 'Materia desconocida';
}

public function mostrarCalificaciones($alumnoId)
{
    $calificaciones = Calificaciones::where('id_alumno', $alumnoId)->get();
    
    // Convertir el código de materia al nombre correspondiente
    $materias = $this->getMateriasList();

    return view('nombre_de_la_vista', compact('calificaciones', 'materias'));
}



    public function detalleAlumno($alumno_id, $grupo_id)
    {
        $alumno = Alumnos::findOrFail($alumno_id);
        $grupo = Grupos::findOrFail($grupo_id);
    
        // Obtener el ciclo actual
        $cicloActual = $grupo->ciclo;
    
        // Obtener los trimestres y las calificaciones del ciclo actual
        $trimestres = $cicloActual->trimestres;
        $calificacionesPorTrimestre = [];
    
        foreach ($trimestres as $trimestre) {
            $calificacionesPorTrimestre[$trimestre->nombre] = $alumno->calificaciones()
                ->where('id_trimestre', $trimestre->id)
                ->get();
        }
    
        // Obtener las notas del alumno
        $notas = $alumno->notas;

        $materiasList = $this->getMateriasList();

        $sugerencias = $this->arbolDesicion($alumno_id);
    
        return view('maestros.alumno_detalle', compact('alumno', 'calificacionesPorTrimestre', 'notas', 'cicloActual', 'materiasList', 'sugerencias'));
    }
    
    public function arbolDesicion($alumnoId) {
        // Obtener calificaciones del alumno
        $calificaciones = Calificaciones::where('id_alumno', $alumnoId)->get();
        
        // Inicializar la nota de apoyo
        $sugerencias = [];

        // Recuperar las calificaciones por materia
        $matematicas = $calificaciones->where('id_materia', 21)->first()->calificacion ?? 0; // Código 21 para Matemáticas
        $espanol = $calificaciones->where('id_materia', 11)->first()->calificacion ?? 0; // Código 11 para Español
        $formacionCivica = $calificaciones->where('id_materia', 33)->first()->calificacion ?? 0; // Código 33 para Formación Cívica
        $educacionFisica = $calificaciones->where('id_materia', 42)->first()->calificacion ?? 0; // Código 42 para Educación Física

        // Recuperar las notas del alumno
        $notas = Notas::where('id_alumno', $alumnoId)->get();
        $felicitaciones = $notas->where('asunto', 'Felicitación')->count();
        $problemasConducta = $notas->where('asunto', 'Problema de Conducta')->count();
        $problemasAcademicos = $notas->where('asunto', 'Problema Académico')->count();

        // Árbol de decisiones basado en las notas
        if ($felicitaciones > $problemasConducta && $felicitaciones > $problemasAcademicos) {
            $sugerencias[] = "El estudiante muestra un comportamiento ejemplar.";
        } elseif ($problemasConducta > $felicitaciones && $problemasConducta > $problemasAcademicos) {
            $sugerencias[] = "El estudiante necesita mejorar su conducta.";
        } elseif ($problemasAcademicos > $felicitaciones && $problemasAcademicos > $problemasConducta) {
            $sugerencias[] = "El estudiante requiere apoyo académico adicional.";
        }

        // Promedio de las materias clave
        $promedio = ($matematicas + $espanol + $formacionCivica + $educacionFisica) / 4;

    if ($promedio >= 9) {
        $sugerencias[] = "Excelente desempeño académico en general.";
    } elseif ($promedio >= 7 && $promedio < 9) {
        $sugerencias[] = "Buen desempeño académico, pero hay espacio para mejorar.";
    } else {
        $sugerencias[] = "Se requiere atención especial en el desempeño académico.";
    }

        // Análisis de materias individuales
        if ($matematicas < 7) {
            $sugerencias[] = "Necesita refuerzo en matemáticas.";
        }
        if ($espanol < 7) {
            $sugerencias[] = "Necesita refuerzo en español.";
        }
        if ($formacionCivica < 7) {
            $sugerencias[] = "Necesita mejorar en formación cívica.";
        }
        if ($educacionFisica < 7) {
            $sugerencias[] = "Necesita mejorar en educación física.";
        }
    
        // Retornar el array de sugerencias
        return $sugerencias;
    }
}

