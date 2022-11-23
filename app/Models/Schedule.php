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

    public function reservations(){
        return $this->hasMany(Reservation::class);
    }

    public function screen(){
        return $this->belongsTo(Screen::class);
    }
}
