<?php

namespace Database\Factories;

use App\Models\Professor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meeting>
 */
class MeetingFactory extends Factory
{

    //protected $model = Meeting::class;
    /**
     * Define the model's default state.
     *
     *@return array<string, mixed>
     */
    public function definition()
    {
        $regex = '[A-Z][0-5]{3}';
        return [
            'subject'=>$this->faker->sentence(),
            'date'=>$this->faker->date(),
            'room'=>fake()->regexify(
                $regex
            ),
            'user_id'=>User::factory(),
            'professor_id'=>Professor::factory(),
            
        ];
    }
}
