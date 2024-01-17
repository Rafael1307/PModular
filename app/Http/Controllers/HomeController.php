<?php

namespace App\Http\Controllers;

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
            return view('homem');
        }
        elseif(($user->rol) == 2){
            return view('homed');
        }
        elseif(($user->rol) == 3){
            return view('homea');
        }
        
    }
}
