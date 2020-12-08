<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;

    protected $fillable = ['titulo','director','duracion','genero','reparto','sinopsis','clasificacion','estado','fechaEstreno','imagen_promocional','trailer','tipo_pelicula'];


    public function critica()
    {
        return $this->hasMany('App\Models\critica');
    }
}