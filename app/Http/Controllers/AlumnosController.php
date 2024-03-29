<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Alumnos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Grupos;
use App\Models\Sis_Grupos;

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
}
