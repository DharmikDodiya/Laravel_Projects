<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class blogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'blogname'=>fake()->text(20),
            'blog_description'=>fake()->text(10),
            'email'=>fake()->unique()->safeEmail(),
            'category_id'=>rand(1,25),
            'city'=>fake()->city(),
        ];
    }
}
