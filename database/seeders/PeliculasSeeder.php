<?php

namespace Database\Seeders;

use App\Models\Pelicula; 
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PeliculasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('peliculas')->insert([
            'nombre' => 'Como entrenar a tu dragon',
            'duracion' => '98',
            'year' => '2010',
            'descripcion' => 'Ambientada en el mítico mundo de los rudos vikingos y los dragones salvajes, y basada en el libro de Cressida Cowell, esta comedia de acción narra la historia de Hipo, un vikingo adolescente que no encaja exactamente en la antiquísima reputación de su tribu como matadores de dragones. El mundo de Hipo se trastoca al encontrar a un dragón que le desafía a él y a sus compañeros vikingos a ver el mundo desde un punto de vista totalmente diferente.',
            'fechaPublicacion' => '2021-05-23',
            'imagen' => 'https://es.web.img3.acsta.net/medias/nmedia/18/72/98/66/20235719.jpg',
        ]);
        DB::table('peliculas')->insert([
            'nombre' => 'Shrek',
            'duracion' => '95',
            'year' => '2001',
            'descripcion' => 'Un ogro llamado Shrek vive en su pantano, pero su preciada soledad se ve súbitamente interrumpida por la invasión de los ruidosos personajes de los cuentos de hadas. Todos fueron expulsados de sus reinos por el malvado Lord Farquaad. Decidido a salvar su hogar, Shrek hace un trato con Farquaad y se prepara para rescatar a la princesa Fiona, quien será la esposa de Farquaad.',
            'fechaPublicacion' => '2021-05-23',
            'imagen' => 'https://pics.filmaffinity.com/Shrek-903764423-large.jpg',
        ]);
        Pelicula::create([
            'nombre' => 'Kung Fu Panda',
            'duracion' => '95',
            'year' => '2008',
            'descripcion' => 'El panda Po trabaja en la tienda de fideos de su familia y sueña en convertirse en un maestro del kung-fu. Su sueño se hace una realidad cuando es inesperadamente elegido para cumplir una antigua profecía y debe estudiar artes marciales con sus ídolos, los Cinco Furiosos. Po necesitará toda la sabiduría, fortaleza y habilidades para poder proteger a su gente de Tai Lung, un maldito leopardo de nieve.',
            'fechaPublicacion' => '2021-05-23',
            'imagen' => 'https://es.web.img3.acsta.net/pictures/16/03/04/13/44/418557.jpg',
        ]);
    }
}
