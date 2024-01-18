<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChooseRoleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/adlr', function () {
    return view('welcomeadlr');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

use App\Http\Controllers\CalificacionesController;
use App\Http\Controllers\MaestrosController;
use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\TutoresController;

Route::resource('/calificaciones', CalificacionesController::class);

Route::resource('/maestros', MaestrosController::class)->middleware('auth');


// Rutas para Alumnos
Route::resource('/alumnos', AlumnosController::class)->middleware('auth');


// Rutas para Tutores
Route::resource('/tutores', TutoresController::class)->middleware('auth');


Route::middleware(['auth'])->group(function () {
    Route::get('/choose-role', [ChooseRoleController::class, 'show']);
    Route::post('/choose-role', [ChooseRoleController::class, 'choose']);


 
});