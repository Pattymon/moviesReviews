<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => "1",
            'pelicula_id' => $this->faker->numberBetween(1,7),
            'valoracion' => $this->faker->numberBetween(1,10),
            'resena' => $this->faker->text(),
        ];
    }
}