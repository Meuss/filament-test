<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Session>
 */
class SessionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $start_at = fake()->dateTimeBetween('today', '+1 week');
        $end_at = $start_at->modify('+2 hours');
        $therapist_id = \App\Models\Therapist::inRandomOrder()->first()->id;
        $room_id = \App\Models\Room::inRandomOrder()->first()->id;
        return [
            'therapist_id' => $therapist_id,
            'room_id' => $room_id,
            'start_at' => $start_at,
            'end_at' => $end_at,
        ];
    }
}
