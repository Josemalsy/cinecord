<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelicula;
use App\Models\Sala;
use App\Models\pelicula_sala;


class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peliculas = Pelicula::get();
        return $peliculas;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function extraerSesiones(Request $request){


       $sesiones =  pelicula_sala::get()->where('sala_id',"1")->where("fecha",$request->fecha);
    
        return $sesiones;

    } 


    public function create(){
    
        return view('cartelera.subirPeliculaForm');
    
        }

        public function asignarPelicula(){

            $peliculas = Pelicula::all();
            $salas = Sala::all();


            return view('cartelera.asignarPeliculaSala')->with('peliculas',$peliculas)->with('salas',$salas);


        
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


            $totalSalas = 5;

            foreach($xml as $pelicula_sala){

                        $pelicula_sala = new pelicula_sala([

                            'pelicula_id'=>$pelicula_sala->id,
                            'fecha'=>$pelicula_sala->fechaEstreno,
                            'sala_id'=>$pelicula_sala->sala,
                            'hora'=>$pelicula_sala->hora
                            
        
                        ]);
                       

                        $pelicula_sala->save();

            
        }
    }

}
           public function subirPeliculasXML(){
            if(!$xml = simplexml_load_file($_FILES['file']['tmp_name'])){
                echo "No se ha podido cargar el archivo";
            } else {
    
    
                /*       $pelicula = new Pelicula([
    
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
                        'tipo_pelicula'=>$pelicula->tipo_pelicula */

    
                foreach($xml as $pelicula){              
    
                    $pelicula = new Pelicula([
    
                        'titulo' => $pelicula->titulo,
                        'director' => $pelicula->director,
                        'duracion' =>  100,
                        'genero' =>  $pelicula->generos,
                        'reparto' => 'no data',
                        'sinopsis' => $pelicula->sinopsis,
                        'clasificacion' => 'no data',
                        'estado' => 'no data',
                        'imagen_promocional' => $pelicula->imagen,
                        'trailer' => 'no data',
                        'tipo_pelicula'=>'no data',
    
                    ]);
                    
                    $pelicula->save();
                }
                return redirect('/');
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