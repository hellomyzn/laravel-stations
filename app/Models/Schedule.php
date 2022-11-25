<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;
use App\Models\Reservation;
use App\Models\Screen;
use App\Models\ScreenSchedule;

class Schedule extends Model
{
    use HasFactory;
    // protected $with = ['movies'];
    
    protected $dates = [
        'start_time', 
        'end_time'
    ];

    public function movie(){
        return $this->belongsTo(Movie::class);
    }


    public function screens(){
        return $this->belongsToMany(Screen::class,
                                    'screen_schedules',
                                    'schedule_id',
                                    'screen_id');
    }

    public function screen_schedules(){
        return $this->hasMany(ScreenSchedule::class);
    }

    public function reservations(){
        return $this->hasManyThrough(
            Reservation::class,
            ScreenSchedule::class,
            'schedule_id',
            'screen_schedule_id',
            'id',
            'id'
        );
    }
}
