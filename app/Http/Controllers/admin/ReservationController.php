<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ReservationRequest;
use App\Models\Reservation;
use App\Models\Movie;
use App\Models\Sheet;
use App\Models\Schedule;
use App\Models\User;
use Carbon\CarbonImmutable;


class ReservationController extends Controller
{
    public function index(){
        $now = CarbonImmutable::now()->format('Y-m-d H:m:s');
        $schedules = Schedule::where('start_time', '>=', $now)->get();
        $all_reservations = Reservation::all();
        
        $reservations = $all_reservations->map(function($item, $key) use($now) {
            $start_time = $item->screen_schedule->schedule->start_time->format('Y-m-d H:m:s');
            if ($now < $start_time){ return $item; }
        });

        # remove null
        $reservations = $reservations->filter();
        return view('admin.reservations.index', compact(['reservations']));
    }

    public function create(){
        $movies = Movie::all();
        $sheets = Sheet::all();
        $schedules = Schedule::all();
        $users = User::all();

        return view('admin.reservations.create', compact([
            'movies',
            'sheets',
            'schedules',
            'users'
        ]));
    }

    public function store(ReservationRequest $request){
        $reservation = new Reservation();
        $reservation->screening_date = $request->input('screening_date');
        $reservation->schedule_id = $request->input('schedule_id');
        $reservation->sheet_id = $request->input('sheet_id');
        $reservation->user_id = $request->input('sheet_id');

        try {
            $reservation->save();
          } catch (\Exception $e) {

            return abort(302, $e->getMessage());
          }
        
        return redirect()->route('admin.reservations.index');
    }

    public function show($id){
        $reservation = Reservation::findOrFail($id);

        return view('admin.reservations.show', compact(['reservation']));
    }

    public function edit($id){
        $reservation = Reservation::findOrFail($id);
        $movies = Movie::all();
        $sheets = Sheet::all();
        $schedules = Schedule::all();

        return view('admin.reservations.edit', compact([
            'reservation',
            'movies',
            'sheets',
            'schedules'
        ]));
    }

    public function update(ReservationRequest $request, $id){
        $reservation = Reservation::findOrFail($id);
        $reservation->screening_date = $request->input('screening_date');
        $reservation->schedule_id = $request->input('schedule_id');
        $reservation->sheet_id = $request->input('sheet_id');
        $reservation->name = $request->input('name');
        $reservation->email = $request->input('email');

        try {
            $reservation->save();
          } catch (\Exception $e) {

            return abort(302, $e->getMessage());
          }
        return redirect()->route('admin.reservations.show', ['id' => $id]);
    }

    public function destroy($id){
        $reservation = Reservation::findOrFail($id);
        try {
            $reservation->delete();
          } catch (\Exception $e) {

            return abort(404, $e->getMessage());
          }
        return redirect()->route('admin.reservations.index');
    }
}
