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

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        var_dump($request->get('genero'));
        
        $request->validate([
            'titulo' => ['required','max:255'],
            'director' => ['required','max:255'],
            'duracion' => ['required','numeric'],
            'genero' =>  ['required'],
            'reparto' => 'required',
            'sinopsis' => 'required',
            'clasificacion' => 'required',
            'estado' => 'required'
        ]);


            $genero = implode(",",$request->get('genero'));



        $pelicula = new Pelicula([

            'titulo' => $request->get('titulo'),
            'director' => $request->get('director'),
            'duracion' => $request->get('duracion'),
            'genero' =>  $genero,
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