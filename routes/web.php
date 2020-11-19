<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FenofaseController;
use App\Http\Controllers\ClimaController;
use App\Http\Controllers\EscalaController;
use App\Http\Controllers\EspecieController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\FamiliaController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\Grafica1Controller;
use App\Exports\NotasExport;
use Maatwebsite\Excel\Facades\Excel;

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
    return view('Template.template');
});



Route::resource('fenofases', FenofaseController::class);
Route::resource('climas', ClimaController::class);
Route::resource('escalas', EscalaController::class);
Route::resource('especies', EspecieController::class);
Route::resource('estados', EstadoController::class);
Route::resource('familias', FamiliaController::class);
Route::resource('generos', GeneroController::class);

Route::get('/graficas', function () {
    return view('Graficas.inicio');
});

Route::get('/menu', function () {
    return view('Template.menugraf');
});

Auth::routes();
Route::get('/graficas/grafica1', [App\Http\Controllers\Grafica1Controller::class, 'observacionesobservadorInfo'])->name('grafica1');
Route::get('/graficas/grafica2', [App\Http\Controllers\Grafica1Controller::class, 'observacionesespeciesInfo'])->name('grafica2');
Route::get('/graficas/grafica3', [App\Http\Controllers\Grafica1Controller::class, 'observacionessitiosInfo'])->name('grafica3');
Route::get('/graficas/grafica4', [App\Http\Controllers\Grafica1Controller::class, 'observacionesfenofasesInfo'])->name('grafica4');
Route::get('/graficas/grafica5', [App\Http\Controllers\Grafica1Controller::class, 'calendariosespeciesInfo'])->name('grafica5');
Route::get('/graficas/grafica6', [App\Http\Controllers\Grafica1Controller::class, 'grafica6'])->name('grafica6');
Route::get('/graficas/grafica7', [App\Http\Controllers\Grafica1Controller::class, 'grafica7'])->name('grafica7');
Route::get('/graficas/grafica8', [App\Http\Controllers\Grafica1Controller::class, 'grafica8'])->name('grafica8');
Route::get('/graficas/grafica9', [App\Http\Controllers\Grafica1Controller::class, 'grafica9'])->name('grafica9');
Route::get('/graficas/grafica10', [App\Http\Controllers\Grafica1Controller::class, 'grafica10'])->name('grafica10');
Route::get('/graficas/grafica11', [App\Http\Controllers\Grafica1Controller::class, 'grafica11'])->name('grafica11');
Route::get('/graficas/grafica12', [App\Http\Controllers\Grafica1Controller::class, 'grafica12'])->name('grafica12');
Route::get('/graficas/grafica13', [App\Http\Controllers\Grafica1Controller::class, 'grafica13'])->name('grafica13');

Route::get('/graficas/grafica9/exportar', [App\Http\Controllers\Grafica1Controller::class, 'bladeToExcel'])->name('exportar');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
