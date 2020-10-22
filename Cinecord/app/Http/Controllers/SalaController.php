<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sala;

class SalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $sala = Sala::get()->where('id',1)->first();

        // $columnas_Filas = $sala->aforo/2;

        // $filas = $sala->aforo/2;
        // $columnas = $sala->aforo/2;


        // $pasillo = 3;

        
        
        

        

       

        //  return view('sala.verSala')->with('salas',$sala)->with('pasillo',$pasillo)->with('filas',$filas)->with('columnas',$columnas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sala.crearSala');
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
        'aforo' => ['required','numeric'],
        'tipoSala' => ['required'],
        
    ]);

        $sala = new Sala([

            'aforo'=> $request->get('aforo'),
            'tipo_sala'=>$request->get('tipoSala')




        ]);

        $sala->save();
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
