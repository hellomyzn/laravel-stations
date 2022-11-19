<?php

namespace Database\Seeders;

use App\Models\Practice;
use App\Models\Movie;
use Database\Seeders\SheetTableSeeder;
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
        $this->call([
            SheetTableSeeder::class
        ]);
        
    }
}
