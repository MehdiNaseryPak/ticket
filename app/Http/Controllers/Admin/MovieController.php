<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Category;
use App\Models\Movie;
use App\Services\Image\ImageUpload;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.movies.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.movies.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovieRequest $request)
    {
        $image = ImageUpload::save($request->file('image'),'movies');
        $background = ImageUpload::save($request->file('background'),'movies');
        $trailer = $request->file('trailer')->store('', 'video');
        Movie::query()->create([
            'name' => $request->name,
            'cat_id' => $request->category,
            'image' => $image,
            'background' => $background,
            'description' => $request->description,
            'genre' => $request->genre,
            'director' => $request->director,
            'trailer' => $trailer,
            'count' => $request->count,
            'commentable' => $request->commentable,
            'time' => $request->time,
        ]);
        return redirect()->route('admin.movies.index')->with('message','فیلم با موفقیت ثبت شد');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        $categories = Category::all();
        return view('admin.movies.edit',compact('categories','movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        if($request->hasFile('image'))
            $image = ImageUpload::save($request->file('image'),'movies');
        if($request->hasFile('background'))
            $background = ImageUpload::save($request->file('background'),'movies');
        if($request->hasFile('trailer'))
            $trailer = $request->file('trailer')->store('', 'video');
        $movie->update([
            'name' => $request->name,
            'cat_id' => $request->category,
            'image' => $image ?? $movie->image,
            'background' => $background ?? $movie->background,
            'description' => $request->description,
            'genre' => $request->genre,
            'director' => $request->director,
            'trailer' => $trailer ?? $movie->trailer,
            'count' => $request->count,
            'commentable' => $request->commentable,
            'time' => $request->time,
        ]);
        return redirect()->route('admin.movies.index')->with('message','فیلم با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
