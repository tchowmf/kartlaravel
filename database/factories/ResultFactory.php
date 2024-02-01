<?php

namespace Database\Factories;

use App\Models\Kart;
use App\Models\Driver;
use App\Models\Result;
use App\Models\RaceTrack;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ResultFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    protected $model = Result::class;

    public function definition(): array
    {
        return [
            'kart_id' => Kart::factory(),
            'driver_id' => Driver::factory(),
            'racetrack_id' => RaceTrack::factory(),
            'best_lap' => $this->faker->randomFloat(3, 2, 100)
        ];
    }
}
