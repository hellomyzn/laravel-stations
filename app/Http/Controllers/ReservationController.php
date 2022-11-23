<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReservationRequest;
use App\Models\Movie;
use App\Models\Schedule;
use App\Models\Sheet;

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

        return view('movies.reservation.create', compact([
            'movie',
            'schedule',
            'screening_date',
            'sheet']));
    }

    public function store(ReservationRequest $request){
        return "hoge";
    }
}
