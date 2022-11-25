<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Movie;
use App\Models\Schedule;
use App\Models\Sheet;
use App\Models\User;
use Carbon\CarbonImmutable;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'schedule_id' => Schedule::factory(),
            'screen_schedule_id' => random_int(1, 10),
            'sheet_id' => random_int(1, 14),
            'user_id' => random_int(1, 10),
            'screening_date' => CarbonImmutable::now()->format('Y-m-d'),
        ];
    }
}
