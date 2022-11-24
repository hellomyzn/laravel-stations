<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Schedule;

class Screen extends Model
{
    use HasFactory;
    
    public function schedules(){
        return $this->belongsToMany(Schedule::class,
                                    'screen_schedule',
                                    'screen_id',
                                    'schedule_id');
    }
}
