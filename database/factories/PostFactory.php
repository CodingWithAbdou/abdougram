<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $array = ['one.jpg' , 'two.jpg' , 'three.jpg' , 'four.jpg'];
        return [
            'description' => fake()->sentence(),
            'slug' => fake()->regexify('[A-Za-z0-9]{15}'),
            'user_id' => User::factory(),
            'image' => 'posts/' . fake()->randomElement($array)
        ];
    }
}
