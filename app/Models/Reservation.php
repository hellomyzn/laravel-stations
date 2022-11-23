<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Schedule;
use App\Models\Sheet;


class Reservation extends Model
{
    use HasFactory;

    public function schedule(){
        return $this->belongsTo(Schedule::class);
    }

    public function sheet(){
        return $this->hasOne(Sheet::class);
    }
}
