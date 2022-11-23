<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index(Request $request){
        $movies = Movie::all();
        $keyword = $request->input('keyword');
        $is_showing = $request->input('is_showing');

        $query = Movie::query();
        $query->when(!is_null($keyword), function($query) use ($keyword){
            return $query->where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('description', 'LIKE', "%{$keyword}%");
        });
        $query->when(!is_null($is_showing), function($query) use ($is_showing){
            return $query->where('is_showing', $is_showing);
        });

        $movies = $query->get();

        return view("movies.index", compact(['movies','keyword']));
    }
    

    public function show($id){
        $movie = Movie::findOrFail($id);
        $schedules = $movie->schedules;

        
        return view('movies.show', compact(['movie', 'schedules']));
    }


    public function show_sheets(Request $request, $id, $schedule_id){
        
        return view('movies.show_sheets', compact(['id', 'schedule_id', 'screening_date']));
    }
}
