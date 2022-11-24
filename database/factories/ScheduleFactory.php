<?php

namespace Database\Factories;

use App\Models\Movie;
use App\Models\Screen;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'movie_id' => Movie::factory(),
            // 'screen_id' => random_int(0, 2),
            'start_time' => CarbonImmutable::now()->addHours(1),
            'end_time' => CarbonImmutable::now()->addHours(3),
        ];
    }
}
