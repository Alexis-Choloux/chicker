<?php

namespace Database\Factories;

use App\Models\Chick;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChickFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Chick::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'content' => $this->faker->sentence,
            'image' => $this->faker->sentence,
            'tags' => $this->faker->sentence,
        ];
    }
}