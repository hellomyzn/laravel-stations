<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use Carbon\CarbonImmutable;

class ReservationController extends Controller
{
    public function index(){

        $reservations = Reservation::whereHas('schedule', function($query){
            $now = CarbonImmutable::now()->format('Y-m-d H:m:s');
            $query->where('start_time', '>=', $now);
        })->get();

        return view('admin.reservations.index', compact(['reservations']));
    }

    public function create(){
        return view('admin.reservations.create');
    }
}
