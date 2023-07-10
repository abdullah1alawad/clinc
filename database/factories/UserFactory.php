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
            'username'=>$this->faker->userName(),
            'fname' => $this->faker->firstName(),
            'mname'=>$this->faker->name(),
            'lname'=>$this->faker->lastName(),
            'mother_name'=>$this->faker->firstNameFemale(),
            'birth_date'=>$this->faker->date(),
            'birth_location'=>$this->faker->city(),
            'national_id'=>$this->faker->numberBetween(1,2000),
            'constraint'=>$this->faker->city(),
            'gender'=>$this->faker->randomElement(['Male', 'Female']),
            'address'=>$this->faker->country(),
            'phone'=>$this->faker->phoneNumber(),
            'password' =>bcrypt('password'),
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
