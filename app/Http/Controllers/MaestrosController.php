<?php

namespace App\Http\Controllers;

use App\Models\Maestros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Materias;

class MaestrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maestros = Maestros::paginate();
        return view('maestros.index', compact('maestros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $usuariosConRolUno = User::where('rol', 1)->get(['id', 'email']);
        return view('maestros.create', compact('usuariosConRolUno'));
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
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'telefono' => 'required|string|max:15',
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
    public function show($id)
    {
       
        $maestros = Maestros::find($id);
        //$maestros->load('materias');
        $materias = $maestros->materias;
        $materiasList = $this->getMateriasList();

        // Enviar los datos del maestro a la vista show.blade.php
        return view('maestros.show', compact('maestros', 'materias', 'materiasList'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Maestros  $maestros
     * @return \Illuminate\Http\Response
     */
    public function edit(Maestros $maestro)
    {

        $usuariosConRolUno = User::where('rol', 1)->get(['id', 'email']);
        
        return view('maestros.edit', compact(['maestro','usuariosConRolUno']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maestros  $maestros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $maestro)
    {

        $maestros = Maestros::find($maestro);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'telefono' => 'required|numeric|max:10',
            'correo' => 'required|email|unique:maestros',
            // Otros campos que puedas tener
        ],[
            'nombre.required' => 'El campo nombre es obligatorio.',
            'apellido.required' => 'El campo apellido es obligatorio.',
            'telefono.required' => 'El campo telefono es obligatorio.',
            'correo.required' => 'El campo correo es obligatorio.',
            'nombre.max' => 'El campo nombre no puede tener más de :max caracteres.',
            'apellido.max' => 'El campo apellido no puede tener más de :max caracteres.',
            'telefono.max' => 'El campo telefono no puede tener más de :max caracteres.',
            'foto.max' => 'El campo nombre no puede medir más de :max .',
            'foto.mimes' => 'El formato del archivo no es valido.',
            
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
    public function destroy( $id)
    {

        $maestros = Maestros::find($id);
        Storage::disk('public')->delete($maestros->foto);
        $maestros->delete();
        return redirect()->route('maestros.index')->with('success', 'Maestro eliminado exitosamente');
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
