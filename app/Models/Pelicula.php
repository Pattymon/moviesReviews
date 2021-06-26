<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'duracion', 'year', 'descripcion', 'imagen', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function actores(){
        return $this->belongsToMany(Actor::class);
    }

    public function reviews() : HasMany
    {
        return $this->hasMany(Review::class);
    }
}
