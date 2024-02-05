<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'role' => fake()->text(10),
            'admission_date' => fake()->date('Y-m-d'),
            'resignation_date' => fake()->date('Y-m-d'),
            'team_id' => Team::all()->random()->id,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
