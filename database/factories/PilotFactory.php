<?php

namespace Database\Factories;

use App\Models\Pilot;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pilot>
 */
class PilotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Pilot::class;
    
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
        ];
    }
}
