<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;

class Schedule extends Model
{
    use HasFactory;
    protected $with = ['movies'];

    public function movie(){
        return $this->belongsTo(Movie::class);
    }
}
