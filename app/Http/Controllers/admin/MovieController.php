<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MovieRequest;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(){
        $movies = Movie::all();

        return view("admin.movies.index", compact('movies'));
    }

    public function create(){
        return view("admin.movies.create");
    }

    public function store(MovieRequest $request){
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
}
