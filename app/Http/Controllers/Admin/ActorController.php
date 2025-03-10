<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreActorRequest;
use App\Http\Requests\UpdateActorRequest;
use App\Models\Actor;
use App\Services\Image\ImageUpload;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.actors.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.actors.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActorRequest $request)
    {
        $image = ImageUpload::save($request->file('image'),'actors');
        Actor::query()->create([
            'name' => $request->name,
            'image' => $image,
            'bio' => $request->bio,

        ]);
        return redirect()->route('admin.actors.index')->with('message','بازیگر با موفقیت ثبت شد');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Actor $actor)
    {
        return view('admin.actors.edit',compact('actor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActorRequest $request, Actor $actor)
    {
        if($request->hasFile('image'))
            $image = ImageUpload::save($request->file('image'),'actors');
        else
            $image = $actor->image;
        $actor->update([
            'name' => $request->name,
            'image' => $image,
            'bio' => $request->bio,

        ]);
        return redirect()->route('admin.actors.index')->with('message','بازیگر با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
