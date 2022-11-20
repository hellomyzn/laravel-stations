<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MovieCreateRequest;
use App\Http\Requests\Admin\ScheduleRequest;
use App\Models\Movie;
use App\Models\Schedule;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(){
        $movies = Movie::all();
        return view("admin.movies.index", compact('movies'));
    }

    public function show($id){
        $movie = Movie::findOrFail($id);
        $schedules = $movie->schedules;
        return view('admin.movies.show', compact('movie', 'schedules'));
    }

    public function create(){
        return view("admin.movies.create");
    }

    public function store(MovieCreateRequest $request){
        $movie = new Movie();
        $movie->title = $request->title;        
        $movie->image_url = $request->image_url;
        $movie->published_year = $request->published_year;
        if($request->is_showing){
            $movie->is_showing = $request->is_showing;
        } else{
            $movie->is_showing = 0;
        }
        $movie->description = $request->description;
        $movie->save();
        return redirect()->route('admin.movies.index');
    }

    public function edit($id){
        $movie = Movie::findOrFail($id);
        return view('admin.movies.edit', compact(['movie']));
    }

    public function update(MovieCreateRequest $request, $id){
        $movie = Movie::findOrFail($id);

        $movie->title = $request->title;        
        $movie->image_url = $request->image_url;
        $movie->published_year = $request->published_year;
        if($request->is_showing){
            $movie->is_showing = $request->is_showing;
        } else{
            $movie->is_showing = 0;
        }
        $movie->description = $request->description;
        $movie->save();
        return redirect()->route('admin.movies.index');
    }

    public function destroy(Request $request, $id){
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return redirect()->route('admin.movies.index');
    }

    public function create_schedule($id){
        $movie = Movie::findOrFail($id);
        $schedules = $movie->schedules;
        return view('admin.movies.schedules.create', compact(['movie', 'schedules']));
    }
    public function store_schedule(ScheduleRequest $request, $id){
        
        $schedule = new Schedule();
        $schedule->movie_id = $id;
        $schedule->start_time = $request->input('start_time_date') . " " . $request->input('start_time_time');
        $schedule->end_time = $request->input('end_time_date') . " " . $request->input('end_time_time');
        $schedule->save();
        return redirect()->route('admin.movies.schedule.create', ['id' => $id]);
    }
}
