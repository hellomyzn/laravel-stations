<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReservationRequest;
use App\Models\Movie;
use App\Models\Schedule;
use App\Models\Sheet;
use App\Models\Reservation;

class ReservationController extends Controller
{   
    public function create(Request $request, $id, $schedule_id){
        if(is_null($request->screening_date) || is_null($request->sheetId)){
            return abort(400, "Exception message");
        }

        $movie = Movie::findOrFail($id);
        $schedule = Schedule::findOrFail($schedule_id);
        $screening_date = $request->screening_date;
        $sheet = Sheet::findOrFail($request->sheetId);
        
        $existed_reservation = Reservation::where('schedule_id', '=', $schedule->id)->where('sheet_id', '=', $sheet->id)->get();
        if(!is_null($existed_reservation->first())){
            return abort(400, "Exception message");
        }
        return view('movies.reservation.create', compact([
            'movie',
            'schedule',
            'screening_date',
            'sheet']));
    }

    public function store(ReservationRequest $request){
        $reservation = new Reservation();
        $reservation->screening_date = $request->screening_date;
        $reservation->schedule_id = $request->schedule_id;
        $reservation->sheet_id = $request->sheet_id;
        $reservation->email = $request->input('email');
        $reservation->name = $request->input('name');

        $schedule = Schedule::findOrFail($request->schedule_id);
        $movie_id = $schedule->movie->id;



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
