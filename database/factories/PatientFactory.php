<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $student=User::whereHas('roles', function ($query) {
        $query->where('name', 'student');
        })->inRandomOrder()->first()->id;

        $doctor=User::whereHas('roles', function ($query) {
            $query->where('name', 'doctor');
        })->inRandomOrder()->first()->id;

        return [
            'name'=>$this->faker->name,
            'national_id'=>$this->faker->numberBetween(10000,1000000),
            'gender'=>$this->faker->randomElement(['Male', 'Female']),
            'birth_date'=>$this->faker->date(),
            'height'=>$this->faker->numberBetween(150,200),
            'weight'=>$this->faker->numberBetween(50,150),
            'address'=>$this->faker->address,
            'job'=>$this->faker->jobTitle,
            'phone'=>$this->faker->phoneNumber,
            'questions'=>$this->faker->numberBetween(219902310,219902325),
            'last_medical_scan_date'=>$this->faker->date,
            'personal_doctor_name'=>$this->faker->name,
            'currently_disease'=>$this->faker->colorName,
            'skin_disease'=>$this->faker->colorName,
            'skin_surgery'=>$this->faker->linuxProcessor,
            'reason_to_go_hospital'=>$this->faker->realText,
            'reason_to_transform_blood'=>$this->faker->bloodType(),
            'skin_tooth_disease'=>$this->faker->firefox,
            'reason_to_came'=>$this->faker->realText,
            'signature'=>$this->faker->chrome,
        ];
    }
}
