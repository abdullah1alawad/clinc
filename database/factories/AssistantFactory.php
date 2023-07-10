<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assistant>
 */
class AssistantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>User::all()->unique()->random()->id,
            'recruitment_division'=>$this->faker->word,
            'military_status'=>$this->faker->word,
            'family_status'=>$this->faker->word,
            'mother_language'=>$this->faker->languageCode,
            'driving_license'=>$this->faker->randomElement(['Yes','No']),
            'email'=>$this->faker->email,
            'email_verified_at'=>now(),
        ];
    }
}
