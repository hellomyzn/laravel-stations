<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Schedule;
use App\Models\ScreenSchedule;
use App\Models\Sheet;


class Reservation extends Model
{
    use HasFactory;

    public function schedule(){
        return $this->belongsTo(Schedule::class);
    }

    public function screen_schedule(){
        return $this->belongsTo(ScreenSchedule::class);
    }

    public function sheet(){
        return $this->belongsTo(Sheet::class);
    }
}
