<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Responses>
 */
class ResponsesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    //Surveys::factory()->count(5)->create()
    public function definition()
    {
        return [
            'owner' => fake()->name(),
            'question' => fake()->text($maxNbChars = 255),
        ];
    }
}
