<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Schedule;

class Movie extends Model
{
    use HasFactory;

    public function schedules(){
        return $this->hasMany(Schedule::class);
    }
}
