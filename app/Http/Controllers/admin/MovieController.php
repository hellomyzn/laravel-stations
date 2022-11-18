<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index(){
        $movies = Movie::all();

        return view("admin.movies.index", compact('movies'));
    }

    public function create(){
        return view("admin.movies.create");
    }

    public function store(){
        return "hgoe";
    }
}
