<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;
use App\Models\Reservation;
use App\Models\Screen;

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
}
