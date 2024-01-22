<?php

use Illuminate\Auth\Events\Verified;
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

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth','verified')->name('home');

use App\Http\Controllers\CalificacionesController;
use App\Http\Controllers\MaestrosController;
use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\TutoresController;
use App\Http\Controllers\CiclosController;
use App\Http\Controllers\TrimestresController;

Route::resource('/calificaciones', CalificacionesController::class);

Route::resource('/maestros', MaestrosController::class)->middleware(['auth','verified']);


// Rutas para Alumnos
Route::resource('/alumnos', AlumnosController::class)->middleware(['auth','verified']);


// Rutas para Tutores
Route::resource('/tutores', TutoresController::class)->middleware(['auth','verified']);

// Rutas para Ciclos
Route::resource('/ciclos', CiclosController::class)->middleware(['auth','verified']);

// Rutas para Trimestres
Route::get('/trimestres/create/{id_ciclo}', [TrimestresController::class, 'create'])->name('trimestres.create')->middleware(['auth','verified']);
Route::get('/trimestres/¨{id_ciclo}', [TrimestresController::class, 'index'])->name('trimestres.index')->middleware(['auth','verified']);
Route::post('/trimestres/store', [TrimestresController::class, 'store'])->name('trimestres.store')->middleware(['auth','verified']);
Route::get('/trimestres/{trimestre}', [TrimestresController::class, 'show'])->name('trimestres.show')->middleware(['auth','verified']);
Route::get('/trimestres/{trimestre}/edit', [TrimestresController::class, 'edit'])->name('trimestres.edit')->middleware(['auth','verified']);
Route::put('/trimestres/{trimestre}', [TrimestresController::class, 'update'])->name('trimestres.update')->middleware(['auth','verified']);
Route::delete('/trimestres/{trimestre}', [TrimestresController::class, 'destroy'])->name('trimestres.destroy')->middleware(['auth','verified']);


Route::middleware(['auth'])->group(function () {
    Route::get('/choose-role', [ChooseRoleController::class, 'show']);
    Route::post('/choose-role', [ChooseRoleController::class, 'choose']);


 
});