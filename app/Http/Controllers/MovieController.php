<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Sheet;
use App\Models\Screen;
use App\Models\ScreenSchedule;

class MovieController extends Controller
{
    public function index(Request $request){
        $movies = Movie::all();
        $keyword = $request->input('keyword');
        $is_showing = $request->input('is_showing');

        $query = Movie::query();
        if(!is_null($keyword) && !is_null($is_showing)){
            $query->where('title', 'LIKE', "%{$keyword}%")
                ->where('is_showing', $is_showing)
                ->orWhere('description', 'LIKE', "%{$keyword}%")
                ->where('is_showing', $is_showing);
        } elseif(!is_null($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('description', 'LIKE', "%{$keyword}%");
        } elseif(!is_null($is_showing)) {
            $query->where('is_showing', $is_showing);
        }
        
        $movies = $query->get();

        return view("movies.index", compact(['movies','keyword']));
    }
    

    public function show($id){
        $movie = Movie::findOrFail($id);
        $schedules = $movie->schedules;
        
        return view('movies.show', compact(['movie', 'schedules']));
    }


    public function show_sheets(Request $request, $id, $schedule_id){
        if(is_null($request->screening_date)){
            return abort(400, "Exception message");
        }
        $screening_date = $request->screening_date;
        $sheets = Sheet::all();
        $screen_schedules = ScreenSchedule::where('schedule_id', '=', $schedule_id)->get();

        // dd(count($sheets[0]->reservations));
        // dd($screen_schedules[1]->reservations);
        return view('movies.show_sheets', compact(['id', 'schedule_id', 'screening_date', 'sheets']));
    }
}
