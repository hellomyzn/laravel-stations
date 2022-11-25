<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reservation;
use App\Models\Schedule;

class ScreenSchedule extends Model
{
    use HasFactory;
    public function reservations(){
        return $this->hasMany(Reservation::class);
    }

    public function schedule(){
        return $this->belongsTo(Schedule::class);
    }
}
