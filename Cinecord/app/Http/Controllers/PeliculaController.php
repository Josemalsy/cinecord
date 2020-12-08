<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelicula;
use App\Models\Sala;
use App\Models\pelicula_sala;
use Illuminate\Support\Facades\Storage;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $arrayPeliculas = [];
            $peliculas =  Pelicula::get();
            foreach ($peliculas as $pelicula) {    

                    array_push($arrayPeliculas,$pelicula);

            }
    

            $arrayPeliculas = (array) $arrayPeliculas;

            
        

    return $arrayPeliculas;




    

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function extraerSesiones(Request $request){

    $arrayOrdenado = [];
    $sesiones =  pelicula_sala::get()->where('fecha',$request->fechaSeleccionada);
    foreach ($sesiones as $sesion) {    

            array_push($arrayOrdenado,$sesion);

    }
    

    

    return $arrayOrdenado;
        

    } 


    public function totalPeliculas(){
        $totalPeliculas =  Pelicula::all();

        return count($totalPeliculas);
    }

    public function create(){
    
        return view('cartelera.subirPeliculaForm');
    
        }

    public function asignarPelicula(){

            $peliculas = Pelicula::all();
            $salas = Sala::all();

            
            return view('cartelera.asignarPeliculaSala2')->with('peliculas',$peliculas)->with('salas',$salas);


            

    
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        


        $genero = implode(",",$request->get('genero'));    
    
        $pelicula = new Pelicula([

            'titulo' => $request->get('titulo'),
            'director' => $request->get('director'),
            'duracion' => $request->get('duracion'),
            'genero' =>  $genero,
            'reparto' => $request->get('reparto'),
            'sinopsis' => $request->get('sinopsis'),
            'clasificacion' => $request->get('clasificacion'),
            'fechaEstreno' => $request->get('fechaEstreno'),
            'tipo_pelicula' => $request->get('tipo_pelicula'),
            'imagen_promocional' => $request->get('imagen_promocional'),
            'trailer' => $request->get('trailer'),
            

        ]);
            $pelicula->save();

            return $pelicula;



    
    
        

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


            foreach ($xml as $pelicula){

            

                $pelicula = new Pelicula([

                    'titulo' => $pelicula->titulo,
                    'director' => $pelicula->director,
                    'duracion' =>  $pelicula->duracion,
                    'genero' =>  $pelicula->genero,
                    'reparto' => $pelicula->reparto,
                    'sinopsis' => $pelicula->sinopsis,
                    'clasificacion' => $pelicula->clasificacion,
                    'fechaEstreno' => $pelicula->fechaEstreno,
                    'imagen_promocional' => $pelicula->imagen_promocional,
                    'trailer' => $pelicula->trailer,
                    'tipo_pelicula'=>$pelicula->tipo_pelicula

                ]);
                
                $pelicula->save();
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
        $pelicula = Pelicula::find($id);
        $pelicula->imagen_promocional = $request->imagen_promocional;
        $pelicula->titulo = $request->titulo;
        $pelicula->director = $request->director;
        $pelicula->duracion = $request->duracion;
        $pelicula->genero = $request->genero;
        $pelicula->reparto = $request->reparto;
        $pelicula->sinopsis = $request->sinopsis;
        $pelicula->clasificacion = $request->clasificacion;
        $pelicula->fechaEstreno = $request->fechaEstreno;
        $pelicula->tipo_pelicula = $request->tipo_pelicula;
        $pelicula->trailer = $request->trailer;

        $pelicula->save();
        return $pelicula;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelicula = Pelicula::find($id);
        $pelicula->delete();
    }

    public function cargarPeliculas(){

        $peliculas = Pelicula::all();
        

        return $peliculas;

    }

    public function cargarSalas(){

        $salas = Sala::all();
    
        return $salas;
    }
    public function guardarSesiones(Request $request)
    {

        
        dd($request);

    }


}