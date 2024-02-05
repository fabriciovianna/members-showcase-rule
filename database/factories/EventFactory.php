<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => fake()->text(255),
            'event_date' => fake()->date('Y-m-d'),
            'member_id' => Member::all()->random()->id,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
