<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $num=$this->faker->unique()->numberBetween(10,10000);
        $university_id=(string) $num;
        return [
            'user_id'=>User::all()->unique()->random()->id,
            'university_id'=>$university_id,
            'level'=>$this->faker->numberBetween(1,5),
            'email'=>$this->faker->email,
            'semester'=>$this->faker->numberBetween(1,2),
        ];
    }
}
