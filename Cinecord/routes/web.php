<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\CriticaController;



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
    Route::post('staff/cartelera/extraerSesiones',[PeliculaController::class,'extraerSesiones'])->name('peliculas.extraerSesiones');
    Route::get('/staff/cartelera/xml_form',function(){
        return view("cartelera.subidaXML");
    })->name('fileXML');

    // Route::resource('staff/cartelera', PeliculaController::class)->names('peliculas');
    Route::resource('staff/sala', SalaController::class)->names('salas');

    


    Route::post('/staff/cartelera/subida_masiva',[PeliculaController::class,'subirPeliculasXML'])->name('salvar');


});
Route::get('/', function () {
    return view('portada');
});


Route::resource('/peliculasPortada',PeliculaController::class)->only(['index']);

Route::resource('/critica', CriticaController::class)->except(['show']);
Route::get('/critica/mediavaloracion/{id}',[CriticaController::class,'mediaValoracion'])->name('criticas.mediaValoracion');

