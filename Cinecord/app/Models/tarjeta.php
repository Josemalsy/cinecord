<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    public function Usuario()
    {
        return $this->belongsTo('App\Models\User');
    }

}