<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
       'user_id',
       'pelicula_id',
       'valoracion',
       'resena',
    ];

    public function pelicula(){
        return $this->belongsTo(Pelicula::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
