<?php

namespace Database\Seeders;

use App\Models\Practice;
use App\Models\Movie;
use App\Models\Schedule;
use App\Models\Reservation;
use App\Models\Screen;
use App\Models\ScreenSchedule;
use Database\Seeders\SheetTableSeeder;
use Database\Seeders\ScreenScheduleSeeder;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Practice::factory(10)->create();
        Movie::factory(10)->create();
        Schedule::factory(30)->create();
        Screen::factory(3)->create();
        
        $this->call([
            SheetTableSeeder::class,
            ScreenScheduleSeeder::class
        ]);
        Reservation::factory(10)->create();
        
    }
}
