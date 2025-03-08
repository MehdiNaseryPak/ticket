<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMovieGalleryRequest;
use App\Models\Movie;
use App\Services\Image\ImageUpload;
use Illuminate\Http\Request;

class MovieGalleryController extends Controller
{
    public function index(Movie $movie)
    {
        return view('admin.movies.gallery.index',compact('movie'));
    }

    public  function create(Movie $movie)
    {
        return view('admin.movies.gallery.create',compact('movie'));
    }

    public function store(StoreMovieGalleryRequest $request , Movie $movie)
    {
        $image = ImageUpload::save($request->file('image'),'movieGalleries');
        $movie->galleries()->create([
            'image' => $image
        ]);
        return redirect()->route('admin.movies.gallery.index',$movie)->with('message','تصویر گالری با موفقیت ثبت شد');
    }
}
