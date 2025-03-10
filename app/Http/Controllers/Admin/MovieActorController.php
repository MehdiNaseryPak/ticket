<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMovieActorRequest;
use App\Models\Actor;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieActorController extends Controller
{
    public function index(Movie $movie)
    {
        return view('admin.movies.actor.index',compact('movie'));
    }

    public function create(Movie $movie)
    {
        $actors = Actor::query()->where('status',1)->get();
        return view('admin.movies.actor.create',compact('movie','actors'));
    }

    public function store(StoreMovieActorRequest $request , Movie $movie)
    {
        $movie->actors()->attach($request->actors);
        return redirect()->route('admin.movies.actor.index',$movie)->with('message','بازیگر با موفقیت ثبت شد');
    }
}
