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


    public function Estore(Request $request)
    {

        if(!$xml = simplexml_load_file($_FILES['file']['tmp_name'])){
            echo "No se ha podido cargar el archivo";
        } else {
            foreach ($xml as $pelicula){

                $request->validate([
                    'file' => ['required','mimes: xml']
                ]);

                $pelicula = new Pelicula([

                    'titulo' => $pelicula->titulo,
                    'director' => $pelicula->director,
                    'duracion' =>  $pelicula->duracion,
                    'genero' =>  $pelicula->genero,
                    'reparto' => $pelicula->reparto,
                    'sinopsis' => $pelicula->sinopsis,
                    'clasificacion' => $pelicula->clasificacion,
                    'estado' => $pelicula->estado,
                    'imagen_promocional' => $pelicula->imagen_promocional,
                    'trailer' => $pelicula->trailer,

                ]);
                
                $pelicula->save();
            }
        }
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