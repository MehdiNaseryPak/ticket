<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Models\Slider;
use App\Services\Image\ImageUpload;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.sliders.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSliderRequest $request)
    {
        $image = ImageUpload::save($request->file('image'),'sliders');
        Slider::query()->create([
            'title' => $request->title,
            'image' => $image,
            'link' => $request->link,
            'status' => 0
        ]);
        return redirect()->route('admin.sliders.index')->with('message','اسلایدر با موفقیت ثبت شد');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        if($request->file('image'))
            $image = ImageUpload::save($request->file('image'),'sliders');
        else
            $image = $slider->image;

        $slider->update([
            'title' => $request->title,
            'image' => $image,
            'link' => $request->link,
        ]);
        return redirect()->route('admin.sliders.index')->with('message','اسلایدر با موفقیت ویرایش شد');
    }

}
