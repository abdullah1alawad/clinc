<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
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
    public function definition(): array
    {
        return [
            'email'=>$this->faker->email,
            'name'=>$this->faker->name,
            'gender'=>$this->faker->randomElement([0, 1]),
            'phone'=>$this->faker->phoneNumber(),
            'password' =>bcrypt('password'),
            'national_id'=>$this->faker->numberBetween(1,2000),
            'remember_token' => Str::random(10),
        ];
    }


    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
