<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\professor>
 */
class ProfessorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->firstName(),
            'last_name' =>fake()->lastName(),
            'title'=>$this->faker->word(),
            'department'=>$this->faker->word(),
            'faculty'=>$this->faker->word(),
            
        ];
    }
}