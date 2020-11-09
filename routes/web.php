<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FenofaseController;
use App\Http\Controllers\ClimaController;
use App\Http\Controllers\EscalaController;
use App\Http\Controllers\EspecieController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\FamiliaController;
use App\Http\Controllers\GeneroController;



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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
