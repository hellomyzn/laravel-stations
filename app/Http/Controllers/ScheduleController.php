<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\ScheduleRequest;
use App\Models\Schedule;
use App\Models\Movie;


class ScheduleController extends Controller
{
    public function index(){
        $schedules = Schedule::all();
        return view('schedules.index', compact(['schedules']));
    }

    public function edit($id){
        
        $schedule = Schedule::findOrFail($id);
        $movie = $schedule->movie;

        $start_time = date("Y-m-d h:i", strtotime($schedule->start_time));
        $end_time = date("Y-m-d h:i", strtotime($schedule->end_time));
        
        $start_time_date = explode(" ",$start_time)[0];
        $start_time_time = explode(" ",$start_time)[1];

        $end_time_date = explode(" ",$end_time)[0];
        $end_time_time = explode(" ",$end_time)[1];
        return view('schedules.edit', compact([
            'schedule',
            'start_time_date',
            'start_time_time',
            'end_time_date',
            'end_time_time',
            'movie',
        ]));
    }

    public function update(ScheduleRequest $request, $scheduleId){
        $schedule = Schedule::findOrFail($scheduleId);
        $schedule->movie_id = $request->input('movie_id');
        $schedule->start_time = $request->input('start_time_date') . " " . $request->input('start_time_time');
        $schedule->end_time = $request->input('end_time_date') . " " . $request->input('end_time_time');
        $schedule->save();
        return redirect()->route('admin.movies.schedule.create', ['id' => $schedule->movie_id ]);
    }

    public function destroy($id){
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();
        return redirect()->route('admin.movies.schedule.create', ['id' => $schedule->movie_id ]);
    }
}
