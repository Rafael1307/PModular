<?php

namespace App\Http\Controllers;

use App\Models\Notas;
use Illuminate\Http\Request;
use App\Models\Alumnos;
use App\Models\Maestros;

class NotasController extends Controller
{
    public function create($id_materia, $id_alumno)
{
    // Lista de asuntos que pueden seleccionarse
    $asuntos = [
        'Felicitación',
        'Problema de Conducta',
        'Problema Académico',
    ];

    // Obtener el alumno por su ID
    $alumno = Alumnos::findOrFail($id_alumno);
    return view('notas.create', compact('alumno', 'asuntos', 'id_materia'));
}

public function store(Request $request, $id_materia, $id_alumno)
{
    $request->validate([
        'asunto' => 'required|string',
        'descripcion' => 'required|string',
    ]);

        

        Notas::create([
            'asunto' => $request->input('asunto'),
            'descripcion' => $request->input('descripcion'),
            'id_alumno' => $id_alumno,
            'id_maestro' => auth()->user()->maestro->id,
            // Añade otros campos según sea necesario
        ]);

       // Redireccionamos a la página de grupos con el ID de la materia
    return redirect()->route('grupos.indexm', $id_materia)->with('success', 'Nota agregada exitosamente.');
}
}