<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Critica;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CriticaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $criticas = Critica::select('valoracion','texto','pelicula_id','user_id','criticas.created_at','users.name')
        ->join('users','users.id', '=','criticas.user_id')
        ->where('pelicula_id',$request->get('pelicula_id'))
        ->paginate(2);
            
        return [
            'pagination' => [
                'total'        => $criticas->total(),
                'current_page' => $criticas->currentPage(),
                'per_page'     => $criticas->perPage(),
                'last_page'    => $criticas->lastPage(),
                'from'         => $criticas->firstItem(),
                'to'           => $criticas->lastItem(),
            ],
            'criticas' => $criticas

        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::user()->id;
        $critica = new Critica

        ([   
            
            'user_id' => $id,
            'pelicula_id' => $request->get('peli_id'),
            'valoracion' => $request->get('valor'),
            'texto' =>  $request->get('texto'),

        ]);

        $criticas = Critica::get()->where('user_id',$id)->where('pelicula_id',$request->get('peli_id'))->count();

        if($criticas == '0'){
            $critica->save();
        }           
    }

    public function mediaValoracion(Request $request)
    {
        $mediaValor = Critica::select('texto')->where('pelicula_id',1);

        dd(Critica::select('texto')->where('pelicula_id',1));
        return $mediaValor;
    }
   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Critica  $critica
     * @return \Illuminate\Http\Response
     */
    public function show(Critica $critica)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Critica  $critica
     * @return \Illuminate\Http\Response
     */
    public function edit(Critica $critica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Critica  $critica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $critica = Critica::find($id);
        $critica->valoracion = $request->valoracion;
        $critica->texto = $request->texto;
        $critica->save();
        return $critica;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Critica  $critica
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $critica = Critica::find($id);
        $critica->delete();
    }
}
