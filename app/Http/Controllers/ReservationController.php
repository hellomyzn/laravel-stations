<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{   
    public function create(Request $request, $id, $schedule_id){
        if(is_null($request->screening_date) || is_null($request->sheetId)){
            return abort(400, "Exception message");
        }

        $movie_id = $id;
        $screening_date = $request->screening_date;
        $sheet_id = $request->sheetId;

        

        // dd($request->sheet_id);
        return view('movies.reservation.create', compact([
            'movie_id',
            'screening_date',
            'sheet_id']));
    }
}
