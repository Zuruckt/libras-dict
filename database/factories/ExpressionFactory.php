<?php

namespace Database\Factories;

use App\Models\Expression;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ExpressionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Expression::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'text' => $this->faker->unique()->word(),
            'gif_path' => str_replace(['storage/app/', '\\'], [''], $this->faker->unique()->image('storage/app/public/gifs/', 640, 480)), //Placeholder images, faker can't do actual gifs
            'user_id' => User::factory()
        ];
    }
}
