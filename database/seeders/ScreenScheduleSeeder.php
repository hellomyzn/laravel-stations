<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScreenScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = [
            ['id' => 1, 'schedule_id' => 1, 'screen_id' => 1],
            ['id' => 2, 'schedule_id' => 1, 'screen_id' => 2],
            ['id' => 3, 'schedule_id' => 1, 'screen_id' => 3],
            ['id' => 4, 'schedule_id' => 2, 'screen_id' => 1],
            ['id' => 5, 'schedule_id' => 2, 'screen_id' => 2],
            ['id' => 6, 'schedule_id' => 2, 'screen_id' => 3],
            ['id' => 7, 'schedule_id' => 3, 'screen_id' => 1],
            ['id' => 8, 'schedule_id' => 3, 'screen_id' => 2],
            ['id' => 9, 'schedule_id' => 3, 'screen_id' => 3],
            ['id' => 10, 'schedule_id' => 4, 'screen_id' => 1],
            ['id' => 11, 'schedule_id' => 4, 'screen_id' => 2],
            
        ];

        foreach ($seeds as $seed) {
            DB::table('screen_schedules')->insert($seed);
        }
    }
}
