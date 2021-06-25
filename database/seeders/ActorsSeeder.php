<?php

namespace Database\Seeders;

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
        \App\Models\Actor::factory(5)->create();
    }
}
