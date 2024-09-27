<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::paginate();
        return view('user.index', compact('usuarios'));
    }

    public function update(Request $request, User $usuario)
    {
        $role = $request->input('role');

        // Validar que el rol elegido sea uno de los roles permitidos
        if (in_array($role, [1, 2, 3])) {
            $usuario->rol = $role;
            $usuario->save();
            
            
            //$user->DB::update(['rol' => integerValue($role)]);
            return redirect()->route('user.index')->with('success', 'Rol definido exitosamente'); // Redirige a donde sea necesario después de elegir el rol
        }

        return redirect()->back()->with('error', 'Rol no válido');
   
    }

    public function destroy(User $usuario)
    {
        $usuario->forceDelete();
        return redirect()->route('user.index')->with('success', 'Usuario eliminado exitosamente');
    }
}
