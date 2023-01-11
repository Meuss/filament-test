<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Therapist>
 */
class TherapistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = Arr::random(['femme', 'homme']);
        if($gender === 'femme') {
            $first_name = fake()->firstNameFemale();
        } else {
            $first_name = fake()->firstNameMale();
        }
        // get a random user id, but not the one already used by another therapist
        $user_id = \App\Models\User::whereDoesntHave('therapist')->inRandomOrder()->first()->id;
        return [
            'user_id' => $user_id,
            'first_name' => $first_name,
            'last_name' => fake()->lastName(),
            'gender' => $gender,
        ];
    }
}
