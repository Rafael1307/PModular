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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\CalificacionesController;

Route::resource('/calificaciones', CalificacionesController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/choose-role', [ChooseRoleController::class, 'show']);
    Route::post('/choose-role', [ChooseRoleController::class, 'choose']);
});