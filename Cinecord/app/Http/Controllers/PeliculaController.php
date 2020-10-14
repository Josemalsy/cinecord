<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelicula;


class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
    
        return view('cartelera.subirPeliculaForm');
    
        }

        public function asignarPelicula(){

            $peliculas = Pelicula::all();

            

            return view('cartelera.asignarPeliculaSala')->with('peliculas',$peliculas);
      
      
      
      
      
      
          }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => ['required','max:255'],
            'director' => ['required','max:255'],
            'duracion' => ['required','numeric'],
            'genero' =>  ['required','max:255'],
            'reparto' => 'required',
            'sinopsis' => 'required',
            'clasificacion' => 'required',
            'estado' => 'required'
        ]);

        $pelicula = new Pelicula([

            'titulo' => $request->get('titulo'),
            'director' => $request->get('director'),
            'duracion' => $request->get('duracion'),
            'genero' =>  $request->get('genero'),
            'reparto' => $request->get('reparto'),
            'sinopsis' => $request->get('sinopsis'),
            'clasificacion' => $request->get('clasificacion'),
            'estado' => $request->get('estado')

        ]);

        $pelicula->save();

        return redirect('/');

    }


    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}