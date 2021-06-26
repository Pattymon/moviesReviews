<?php

namespace Database\Seeders;

use App\Models\Actor; 
use Illuminate\Database\Seeder;

class ActorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\Actor::factory(5)->create();
        Actor::create([
            'nombre' => 'Jay Baruchel',
            'imagen' => 'https://resizing.flixster.com/99bJuPvkS7EdyssXCMGMzZR_lFk=/506x652/v2/https://flxt.tmsimg.com/v9/AllPhotos/167395/167395_v9_bb.jpg',
            'descripcion' => 'Jonathan Adam Saunders "Jay" Baruchel es un actor y guionista canadiense. Ha tenido una exitosa carrera en películas de comedia y ha aparecido en éxitos de taquilla tales como Million Dollar Baby, Knocked Up, Tropic Thunder, y Cómo entrenar a tu dragón.',
        ]);
        Actor::create([
            'nombre' => 'Mike Myers',
            'imagen' => 'http://t1.gstatic.com/licensed-image?q=tbn:ANd9GcQjeE2h3us9HiZ0OaVXnOhiUysvoD5KTTImdoaCaDUy0pMBmG2IK28qVmkjHYpP',
            'descripcion' => 'Michael John Myers es un actor, guionista, productor de cine y comediante canadiense.​ Ha actuado en Saturday Night Live, en las tres películas de Austin Powers y ha prestado su voz en la serie de películas de Shrek.',
        ]);
        Actor::create([
            'nombre' => 'Eddie Murphy',
            'imagen' => 'http://t3.gstatic.com/licensed-image?q=tbn:ANd9GcQLojFwPTyGRNp3uEYLAFrXrt0Dp7j7adrx9J1V8UtHy-VLbyrt4Z7VP_fVVwnB',
            'descripcion' => 'Edward Regan Murphy, conocido artísticamente como Eddie Murphy ​ es un actor, director de cine, comediante y cantante estadounidense.',
        ]);
        Actor::create([
            'nombre' => 'Jack Black',
            'imagen' => 'http://t0.gstatic.com/licensed-image?q=tbn:ANd9GcS2LEDPTW2ePp7mMFbo2y9CQrwAYJq8bS25XIlfpuAtXtTOxObc_fWLpad9ShRV',
            'descripcion' => 'Thomas Jacob Black, ​ más conocido como Jack Black, es un actor, músico, comediante y productor estadounidense. Entre su extensa filmografía, Black ha protagonizado películas tales como Amor ciego, King Kong, Nacho Libre, Tropic Thunder, The Holiday, Goosebumps, Bernie o Kung Fu Panda.',
        ]);
        Actor::create([
            'nombre' => 'America Ferrera',
            'imagen' => 'http://t2.gstatic.com/licensed-image?q=tbn:ANd9GcSG8SvqmdjoWsm1SkanzFiHCueJ78KdKIu2aP_VtVWRX1vo98c--qfTYd-PhMWW',
            'descripcion' => 'America Georgine Ferrera es una actriz de cine y televisión estadounidense-hondureña conocida principalmente a nivel internacional por protagonizar la telenovela estadounidense Ugly Betty',
        ]);
        
    }
}
