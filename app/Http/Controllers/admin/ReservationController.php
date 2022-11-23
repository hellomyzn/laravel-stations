<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ReservationRequest;
use App\Models\Reservation;
use App\Models\Movie;
use App\Models\Sheet;
use App\Models\Schedule;
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
        $movies = Movie::all();
        $sheets = Sheet::all();
        $schedules = Schedule::all();

        return view('admin.reservations.create', compact([
            'movies',
            'sheets',
            'schedules'
        ]));
    }

    public function store(ReservationRequest $request){
        $reservation = new Reservation();
        $reservation->screening_date = $request->input('screening_date');
        // $reservation->movie_id = $request->input('movie_id');
        $reservation->schedule_id = $request->input('schedule_id');
        $reservation->sheet_id = $request->input('sheet_id');
        $reservation->name = $request->input('name');
        $reservation->email = $request->input('email');

        try {
            $reservation->save();
          } catch (\Exception $e) {

            return abort(302, $e->getMessage());
          }
        
        return redirect()->route('admin.reservations.index');
    }

    public function show($id){
        $reservation = Reservation::findOrFail($id);

        return view('admin.reservation.show');
    }
}
