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
        // [$movieId, $scheduleId] = $this->createMovieAndSchedule();
        return [
            'schedule_id' => random_int(0, 29),
            'sheet_id' => random_int(0, 14),
            'name' => '予約者氏名',
            'email' => "techbowl@techbowl.com",
            'screening_date' => CarbonImmutable::now()->format('Y-m-d'),
        ];
    }

    private function createMovieAndSchedule()
    {
        $movieId = Movie::insertGetId([
            'title' => 'タイトル',
            'image_url' => 'https://techbowl.co.jp/_nuxt/img/6074f79.png',
            'published_year' => 2000,
            'description' => '概要',
            'is_showing' => (bool)random_int(0, 1),
        ]);
        $startTime = CarbonImmutable::now();
        $scheduleId = Schedule::insertGetId([
            'movie_id' => $movieId,
            'start_time' => $startTime,
            'end_time' => $startTime->addHours(2),
        ]);
        return [$movieId, $scheduleId];
    }

}
