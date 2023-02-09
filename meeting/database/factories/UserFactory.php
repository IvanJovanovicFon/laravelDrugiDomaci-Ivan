<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $regex = '[0-2]{2}[0-9]{2}/20[0-9]{2}';
        $regex2 = '[1-6]';
        return [
            'first_name' => fake()->firstName(),
            'last_name' =>fake()->lastName(),
            'index_number'=>fake()->regexify(
                $regex
            ),
            'year_of_study' =>fake()->regexify($regex2),
            'email' => fake()->unique()->safeEmail(),
            'faculty'=>$this->faker->word(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
