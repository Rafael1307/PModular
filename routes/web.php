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
use App\Http\Controllers\GruposController;
use App\Http\Controllers\SisGruposController;
use App\Http\Controllers\MateriasController;
use App\Http\Controllers\DesgloceCalificacionesController;


Route::resource('/calificaciones', CalificacionesController::class)->middleware(['auth','verified']);

Route::resource('materias', MateriasController::class)->middleware(['auth','verified']);


Route::resource('/maestros', MaestrosController::class)->middleware(['auth','verified']);


// Rutas para Alumnos
Route::resource('/alumnos', AlumnosController::class)->middleware(['auth','verified']);


// Rutas para Tutores
Route::get('/tutores/create', [TutoresController::class, 'create'])->name('tutores.create')->middleware(['auth','verified']);
Route::get('/tutores', [TutoresController::class, 'index'])->name('tutores.index')->middleware(['auth','verified']);
Route::post('/tutores/store', [TutoresController::class, 'store'])->name('tutores.store')->middleware(['auth','verified']);
Route::get('/tutores/{tutor}', [TutoresController::class, 'show'])->name('tutores.show')->middleware(['auth','verified']);
Route::get('/tutores/{tutor}/edit', [TutoresController::class, 'edit'])->name('tutores.edit')->middleware(['auth','verified']);
Route::put('/tutores/{tutor}', [TutoresController::class, 'update'])->name('tutores.update')->middleware(['auth','verified']);
Route::delete('/tutores/{tutor}', [TutoresController::class, 'destroy'])->name('tutores.destroy')->middleware(['auth','verified']);


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



Route::get('/grupos/create/{id_ciclo}', [GruposController::class, 'create'])->name('grupos.create')->middleware(['auth','verified']);
Route::get('/grupos/{id_ciclo}', [GruposController::class, 'index'])->name('grupos.index')->middleware(['auth','verified']);
Route::post('/grupos/store', [GruposController::class, 'store'])->name('grupos.store')->middleware(['auth','verified']);
Route::get('/grupos/{grupo}', [GruposController::class, 'show'])->name('grupos.show')->middleware(['auth','verified']);
Route::get('/grupos/{grupo}/edit', [GruposController::class, 'edit'])->name('grupos.edit')->middleware(['auth','verified']);
Route::put('/grupos/{grupo}', [GruposController::class, 'update'])->name('grupos.update')->middleware(['auth','verified']);
Route::delete('/grupos/{grupo}', [GruposController::class, 'destroy'])->name('grupos.destroy')->middleware(['auth','verified']);

Route::get('/grupos/{materia}/indexm', [GruposController::class, 'indexm'])->name('grupos.indexm')->middleware(['auth','verified']);

// Rutas para Grupos de sistema
Route::get('/sisgrupos/create/{id_ciclo}', [SisGruposController::class, 'create'])->name('sis_grupos.create')->middleware(['auth','verified']);
Route::get('/sisgrupos/{id_ciclo}', [SisGruposController::class, 'index'])->name('sis_grupos.index')->middleware(['auth','verified']);
Route::post('/sisgrupos/store', [SisGruposController::class, 'store'])->name('sis_grupos.store')->middleware(['auth','verified']);
Route::get('/sisgrupos/{sisGrupo}', [SisGruposController::class, 'show'])->name('sis_grupos.show')->middleware(['auth','verified']);
Route::get('/sisgrupos/{sisGrupo}/edit', [SisGruposController::class, 'edit'])->name('sis_grupos.edit')->middleware(['auth','verified']);
Route::put('/sisgrupos/{sisGrupo}', [SisGruposController::class, 'update'])->name('sis_grupos.update')->middleware(['auth','verified']);
Route::delete('/sisgrupos/{sisGrupo}', [SisGruposController::class, 'destroy'])->name('sis_grupos.destroy')->middleware(['auth','verified']);



Route::get('/evaluar-grupo/{materia_id}', [DesgloceCalificacionesController::class, 'showEvaluarGrupo'])->name('desgloce_calificaciones.evaluartrimestre')->middleware(['auth','verified']);
Route::post('/evaluar-grupo/{materia_id}/evaluar', [DesgloceCalificacionesController::class, 'showGrupo'])->name('desgloce_calificaciones.calificargrupo')->middleware(['auth','verified']);
Route::put('/evaluar-grupo/{materia_id}/{trimestre_id}',  [DesgloceCalificacionesController::class, 'subirEvaluacion'])->name('desgloce_calificaciones.subirevaluacion')->middleware(['auth','verified']);

Route::middleware(['auth'])->group(function () {
    Route::get('/choose-role', [ChooseRoleController::class, 'show']);
    Route::post('/choose-role', [ChooseRoleController::class, 'choose']);


 
});