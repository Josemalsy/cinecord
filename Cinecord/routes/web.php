<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController;


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


Route::get('/index', function(){
    return view('index');
})->name('index');



Route::group(['middleware' => 'ControlAcceso'], function(){

    Route::get('/staff', function(){
        return view('staff');
    })->name('administradores');
    Route::get('staff/cartelera/asignarPelicula',[PeliculaController::class,'asignarPelicula'])->name('peliculas.asignarPeliculaSala');
    Route::resource('staff/cartelera', PeliculaController::class)->names('peliculas');

    


});
