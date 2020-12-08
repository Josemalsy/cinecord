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
        $salas =  Sala::all();
        
        return $salas;
    }

    public function totalSalas(){
        $totalSalas =  Sala::all();

        return count($totalSalas);
    }


    public function subirSala(){
        return view('cartelera.subirSalaForm');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        
    
        $sala = new Sala([

            'aforo' => $request->get('aforo'),
            'tipo_sala' => $request->get('tipo_sala'),
            'tramoInicial' => $request->get('tramoInicial'),
            'tramoFinal' =>  $request->get('tramoFinal'),
            
            

        ]);
            $sala->save();

            return $sala;



    
    

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
        $sala = Sala::find($id);
        $sala->aforo = $request->aforo;
        $sala->tipo_sala = $request->tipo_sala;
        $sala->tramoInicial = $request->tramoInicial;
        $sala->tramoFinal = $request->tramoFinal;
        $sala->save();
        return $sala;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sala = Sala::find($id);
        $sala->delete();
    }
}
