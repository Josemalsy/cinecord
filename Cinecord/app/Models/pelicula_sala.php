<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula_sala extends Model
{
    use HasFactory;
    protected $fillable = ['pelicula_id','sala_id','fecha','hora'];

}
