<?php


namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Schedule;
use App\Models\Screen;
use App\Models\ScreenSchedule;

class ScreenScheduleController extends Controller
{
    public function create($id){
        $schedule = Schedule::findOrFail($id);
        $movie = $schedule->movie;
        $exsist_screen = $schedule->screens;
        $screens = Screen::all();
        $diff_screens = $screens->diff($exsist_screen);

        return view('admin.screen_schedule.create', compact(['movie', 'schedule', 'diff_screens']));
    }
    
    public function store(Request $request, $id){
        if(is_null($request->input('screen_id'))){
            $schedule = Schedule::findOrFail($id);
            $movie = $schedule->movie;
            return redirect()->route('admin.movies.show', ['id' => $movie->id]);
        }
        $screen_schedule = new ScreenSchedule();
        $screen_schedule->screen_id = $request->input('screen_id');
        $screen_schedule->schedule_id = $id;
        $screen_schedule->save();

        $schedule = Schedule::findOrFail($id);
        $movie = $schedule->movie;
        $exsist_screen = $schedule->screens;
        $screens = Screen::all();
        $diff_screens = $screens->diff($exsist_screen);
        return view('admin.screen_schedule.create', compact(['movie', 'schedule', 'diff_screens']));
    }
}
