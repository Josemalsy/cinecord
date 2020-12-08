<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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
    Route::get('staff/cartelera/cargarPeliculas',[PeliculaController::class,'cargarPeliculas'])->name('peliculas.cargarPeliculas');
    Route::get('staff/cartelera/cargarSalas',[PeliculaController::class,'cargarSalas'])->name('peliculas.cargarSalas');
    Route::get('staff/cartelera/extraerSesiones',[PeliculaController::class,'extraerSesiones'])->name('peliculas.extraerSesiones');
    Route::get('staff/cartelera/subirSala',[SalaController::class,'subirSala'])->name('peliculas.subirSala');
    Route::get('/staff/cartelera/xml_form',function(){
        return view("cartelera.subidaXML");
    })->name('fileXML');
    Route::get('staff/extraerPeliculas',[PeliculaController::class,'index'])->name('peliculas.extraerPeliculas');
    Route::get('extraerPeliculas',[PeliculaController::class,'index'])->name('peliculas.extraerPeliculas2');
    Route::resource('staff/cartelera', PeliculaController::class)->names('peliculas');

    Route::get('staff/totalPeliculas',[PeliculaController::class,'totalPeliculas'])->name('peliculas.totalPeliculas');
    Route::get('staff/totalSalas',[SalaController::class,'totalSalas'])->name('salas.totalSalas');
    
    Route::delete('/staff/peliculas/{id}', [PeliculaController::class,'destroy'])->name('peliculas.eliminar');
    Route::put('/staff/peliculas/{id}', [PeliculaController::class,'update'])->name('peliculas.actualizar');
    Route::post('/staff/cartelera/subirPelicula',[PeliculaController::class,'store'])->name('subirPelicula');
    Route::post('/staff/cartelera/subida_masiva',[PeliculaController::class,'Estore'])->name('salvar');
    Route::post('/staff/cartelera/subida_sesiones',[PeliculaController::class,'guardarSesiones'])->name('sesiones');


    // Panel Admin
    Route::get('staff/tablero',[HomeController::class,'index'])->name('panel.trablero');
    // Salas
    Route::post('/staff/cartelera/subirSala',[SalaController::class,'store'])->name('subirSala');
    Route::get('/staff/extraerSalas',[SalaController::class,'index'])->name('salas.extraerSalas');
    Route::delete('/staff/salas/{id}', [SalaController::class,'destroy'])->name('salas.eliminar');
    Route::put('/staff/salas/{id}', [SalaController::class,'update'])->name('peliculas.actualizar');

    
    Route::get('/prueba',[PeliculaController::class,'prueba'])->name('prueba');
    Route::get('/editarPefil',[UserController::class,'editarPerfil'])->name('editarPerfil');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
