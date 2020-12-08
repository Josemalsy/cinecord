<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;
    
    protected $fillable = ['titulo','director','genero','imagen_promocional','duracion','sinopsis','reparto','clasificacion','fechaEstreno','tipo_pelicula','trailer'];
}