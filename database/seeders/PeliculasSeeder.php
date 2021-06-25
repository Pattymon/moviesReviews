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
            'imagen' => 'https://es.web.img3.acsta.net/medias/nmedia/18/72/98/66/20235719.jpg',
            'user_id' => '1',
        ]);
        DB::table('peliculas')->insert([
            'nombre' => 'Shrek',
            'duracion' => '95',
            'year' => '2001',
            'descripcion' => 'Un ogro llamado Shrek vive en su pantano, pero su preciada soledad se ve súbitamente interrumpida por la invasión de los ruidosos personajes de los cuentos de hadas. Todos fueron expulsados de sus reinos por el malvado Lord Farquaad. Decidido a salvar su hogar, Shrek hace un trato con Farquaad y se prepara para rescatar a la princesa Fiona, quien será la esposa de Farquaad.',
            'imagen' => 'https://pics.filmaffinity.com/Shrek-903764423-large.jpg',
            'user_id' => '1',
        ]);
        Pelicula::create([
            'nombre' => 'Kung Fu Panda',
            'duracion' => '95',
            'year' => '2008',
            'descripcion' => 'El panda Po trabaja en la tienda de fideos de su familia y sueña en convertirse en un maestro del kung-fu. Su sueño se hace una realidad cuando es inesperadamente elegido para cumplir una antigua profecía y debe estudiar artes marciales con sus ídolos, los Cinco Furiosos. Po necesitará toda la sabiduría, fortaleza y habilidades para poder proteger a su gente de Tai Lung, un maldito leopardo de nieve.',
            'imagen' => 'https://es.web.img3.acsta.net/pictures/16/03/04/13/44/418557.jpg',
            'user_id' => '1',
        ]);
        Pelicula::create([
            'nombre' => 'Enredados',
            'duracion' => '130',
            'year' => '2010',
            'descripcion' => 'A una morra la secuestran de niña y la encierran en una torre, años después un bato que iba escapando de la policía la encuentra, se van de viaje y se casan.',
            'imagen' => 'https://images-na.ssl-images-amazon.com/images/I/71-qC7IDkQL._AC_SY679_.jpg',
            'user_id' => '1',
        ]);
        Pelicula::create([
            'nombre' => '	Lluvia de hamburguesas',
            'duracion' => '95',
            'year' => '2009',
            'descripcion' => 'Un bato hace una maquina que crea comida y por un error la manda a la atmosfera por lo que llueve comida.',
            'imagen' => 'https://cafeanimelair2.files.wordpress.com/2014/10/lluvia-de-hamburguesas-1.jpg',
            'user_id' => '1',
        ]);
        Pelicula::create([
            'nombre' => 'La sirenita',
            'duracion' => '85',
            'year' => '1989',
            'descripcion' => 'Una morra que es sirena se enamora de un humano y da su voz y su vida para ir detrás de él :/',
            'imagen' => 'https://i.pinimg.com/originals/57/f3/a7/57f3a7cb2f456c36bcfe04373f75f9b8.jpg',
            'user_id' => '1',
        ]);
        Pelicula::create([
            'nombre' => '	Las locuras del emperador',
            'duracion' => '78',
            'year' => '2000',
            'descripcion' => 'Un emperado medio mamón es convertido en llama por su consejera malvada y un campesino lo ayuda a que vuelva a la normalidad y se haga buen pedo.',
            'imagen' => 'https://i.pinimg.com/originals/42/60/d4/4260d4f6503a77ad0cd235eb9d1263ef.jpg',
            'user_id' => '1',
        ]);
    }
}
