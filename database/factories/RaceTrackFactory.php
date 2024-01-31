<?php

namespace Database\Factories;

use App\Models\RaceTrack;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RaceTrack>
 */
class RaceTrackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = RaceTrack::class;
    
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
        ];
    }
}
