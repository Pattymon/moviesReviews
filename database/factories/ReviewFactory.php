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
            'valoracion' => $this->faker->numberBetween(1,10),
            'fechaPublicacion' => $this->faker->dateTimeThisMonth(),
            'resena' => $this->faker->text(),
            'user_id' => $this->faker->numberBetween(1,2),
            'pelicula_id' => $this->faker->numberBetween(1,7),
        ];
    }
}