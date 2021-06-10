<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PruebaReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Review::factory(20)->create();
    }
}
