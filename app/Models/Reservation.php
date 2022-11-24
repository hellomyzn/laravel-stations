<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Schedule;
use App\Models\ScreenSchedule;


class Reservation extends Model
{
    use HasFactory;

    public function schedule(){
        return $this->belongsTo(Schedule::class);
    }

    public function screen_schedule(){
        return $this->belongsTo(ScreenSchedule::class);
    }
}
