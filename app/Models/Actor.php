<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'imagen', 'descripcion'];

    public function peliculas(){
        return $this->belongsToMany(Pelicula::class);
    }
}
