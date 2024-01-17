<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChooseRoleController extends Controller
{
    public function show()
    {
        return view('choose-role');
    }

    public function choose(Request $request)
    {
        $user = Auth::user();
        $role = $request->input('role');

        // Validar que el rol elegido sea uno de los roles permitidos
        if (in_array($role, [1, 2, 3])) {
            $user->rol = $role;
            $user->save();
            
            
            //$user->DB::update(['rol' => integerValue($role)]);
            return redirect('/home'); // Redirige a donde sea necesario después de elegir el rol
        }

        return redirect()->back()->with('error', 'Rol no válido');
    }
}