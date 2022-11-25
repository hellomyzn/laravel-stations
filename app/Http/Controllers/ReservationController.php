<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReservationRequest;
use App\Models\Movie;
use App\Models\Schedule;
use App\Models\Sheet;
use App\Models\Reservation;
use App\Models\ScreenSchedule;

class ReservationController extends Controller
{   
    public function create(Request $request, $id, $schedule_id){
        if(is_null($request->screening_date) || is_null($request->sheetId)){
            return abort(400, "Exception message");
        }

        $movie = Movie::findOrFail($id);
        
        $screening_date = $request->screening_date;
        $sheet = Sheet::findOrFail($request->sheetId);
        $schedule = Schedule::findOrFail($schedule_id);
        $reservations = $schedule->reservations;
        $screen_schedules = $schedule->screen_schedules;
        $count_reservations = count($reservations->where('sheet_id', '=', $sheet->id));
        $count_screen_schedules = count($screen_schedules);
 
        if($count_reservations == $count_screen_schedules){
            return abort(400, "There is no sheet for the reservation");
        }
        return view('movies.reservation.create', compact([
            'movie',
            'schedule',
            'screening_date',
            'sheet'
        ]));
    }

    public function store(ReservationRequest $request){
        $user = Auth::user();
        $schedule = Schedule::findOrFail($request->schedule_id);
        $movie_id = $schedule->movie->id;
        $sheet_id = $request->sheet_id;
        
        $reservations = $schedule->reservations->where('sheet_id', '=', $sheet_id);        
        $screen_schedules = $schedule->screen_schedules;

        $available_screen_schedules = $screen_schedules->map(function($item, $key) use($reservations) {
            $exist_reservation = count($reservations->where('screen_schedule_id', '=', $item->id));
            if($exist_reservation){
                return null;
            }else{
                return $item;
            }
        });
        # remove null from collection
        $available_screen_schedules = $available_screen_schedules->filter();
        
        $reservation = new Reservation();
        $reservation->screening_date = $request->screening_date;
        $reservation->sheet_id = $request->sheet_id;
        $reservation->screen_schedule_id = $available_screen_schedules->random()->id;
        $reservation->user_id = $user->id;
        
    

        try {
            $reservation->save();
          } catch (\Exception $e) {

            return abort(302, $e->getMessage());
          }
        
        return redirect()
            ->route('movies.show', ['id' => $movie_id ])
            ->with('successMessage', '予約が完了しました');
    }
}
