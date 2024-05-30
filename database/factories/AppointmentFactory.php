<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'start' => $this->faker->dateTimeBetween('now', '+8 hours'),
            'end' => $this->faker->dateTimeBetween('+1 hours', '+24 hours'),
            'sender_id' => User::all()->random()->id,
            'receiver_id' => User::all()->random()->id,
        ];
    }
}
