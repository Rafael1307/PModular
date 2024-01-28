<?php

namespace App\Http\Controllers;
use App\Models\Maestros;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        if(($user->rol) == 0){
            return view('home');
        }
        elseif(($user->rol) == 1){
            $maestro = Maestros::where('correo', $user->email)->first();
            $materias = $maestro->materias;
            $grupos = $maestro->grupos;
            $materiasList = $this->getMateriasList();
            return view('homem', compact('materias', 'grupos', 'materiasList'));
        }
        elseif(($user->rol) == 2){
            return view('homed');
        }
        elseif(($user->rol) == 3){
            return view('homea');
        }
        
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
