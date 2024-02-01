<?php

namespace Database\Factories;

use App\Models\Driver;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pilot>
 */
class DriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Driver::class;
    
    public function definition(): array
    {
        return [
            'racetrack_id' => RaceTrack::factory(),
            'name' => $this->faker->name,
        ];
    }
}
