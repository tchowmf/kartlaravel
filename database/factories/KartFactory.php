<?php

namespace Database\Factories;

use App\Models\Kart;
use App\Models\RaceTrack;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kart>
 */
class KartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Kart::class;

    public function definition(): array
    {
        return [
            'racetrack_id' => RaceTrack::factory(),
            'identifier' => $this->faker->randomNumber(1, 99),
        ];
    }
}
