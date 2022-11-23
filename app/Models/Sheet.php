<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Reservation;

class Sheet extends Model
{
    use HasFactory;

    public function reservation(){
        return $this->hasOne(Reservation::class);
    }
}
