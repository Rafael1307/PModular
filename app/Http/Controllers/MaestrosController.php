<?php

namespace App\Http\Controllers;

use App\Models\Maestros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MaestrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maestros = Maestros::all();
        return view('maestros.index', compact('maestros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maestros.create');
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
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'telefono' => 'required|string|max:15',
            'correo' => 'required|email|unique:maestros',
            // Otros campos que puedas tener
        ]);
    
        // Subir foto si se proporciona
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('uploads', 'public');
        } else {
            $fotoPath = null;
        }
    
        // Crear el maestro en la base de datos
        $maestro = Maestros::create([
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'foto' => $fotoPath,
            'telefono' => $request->input('telefono'),
            'correo' => $request->input('correo'),
            // Otros campos que puedas tener
        ]);

        return redirect()->route('maestros.index')->with('success', 'Maestro creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maestros  $maestros
     * @return \Illuminate\Http\Response
     */
    public function show(Maestros $maestros)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Maestros  $maestros
     * @return \Illuminate\Http\Response
     */
    public function edit(Maestros $maestros)
    {
        return view('maestros.edit', compact('maestro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maestros  $maestros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maestros $maestros)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'telefono' => 'required|string|max:15',
            'correo' => 'required|email|unique:maestros,correo,' . $maestros->id,
            // Otros campos que puedas tener
        ]);
    
        // Subir foto si se proporciona
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('uploads', 'public');
            // Eliminar la foto anterior si existe
            if ($maestros->foto) {
                Storage::disk('public')->delete($maestros->foto);
            }
        } else {
            $fotoPath = $maestros->foto;
        }
    
        // Actualizar el maestro en la base de datos
        $maestros->update([
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'foto' => $fotoPath,
            'telefono' => $request->input('telefono'),
            'correo' => $request->input('correo'),
            // Otros campos que puedas tener
        ]);

        return redirect()->route('maestros.index')->with('success', 'Maestro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maestros  $maestros
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maestros $maestros)
    {
        Storage::disk('public')->delete($maestros->foto);
        $maestros->delete();
        return redirect()->route('maestros.index')->with('success', 'Maestro eliminado exitosamente');
    }
}
