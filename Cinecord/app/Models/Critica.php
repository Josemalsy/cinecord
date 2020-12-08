<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Critica extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','pelicula_id','valoracion','texto'];



    public function user()
    {
        return $this->hasOne('App\Models\user');
    }

    public function pelicula()
    {
        return $this->hasOne('App\Models\pelicula');
    }


}
