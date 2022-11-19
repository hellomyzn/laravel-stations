<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index(Request $request){
        $movies = Movie::all();
        $keyword = $request->input('keyword');

        $query = Movie::query();
        if(!empty($keyword)){
            $query->where('title', 'LIKE', "%{$keyword}%");
        }

        $movies = $query->get();

        return view("movies.index", compact(['movies','keyword']));
    }
}
