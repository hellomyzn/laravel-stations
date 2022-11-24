<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Movie;
use App\Models\Schedule;
use App\Models\Sheet;
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
            'schedule_id' => Schedule::factory(),
            'sheet_id' => random_int(1, 14),
            'name' => '予約者氏名',
            'email' => "techbowl@techbowl.com",
            'screening_date' => CarbonImmutable::now()->format('Y-m-d'),
        ];
    }
}
