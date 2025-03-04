<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Services\Image\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $image = ImageUpload::save($request->file('image'),'users');
        User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'birthdate' => $request->birthdate,
            'image' => $image,
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('admin.users.index')->with('message','کاربر با موفقیت ثبت شد');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if($request->file('image'))
            $image = ImageUpload::save($request->file('image'),'users');
        else
            $image = $user->image;
        if($request->file('password'))
            $password = Hash::make($request->file('password'));
        else
            $password = $user->password;
        User::query()->update([
            'name' => $request->name,
            'birthdate' => $request->birthdate,
            'image' => $image,
            'password' => $password
        ]);
        return redirect()->route('admin.users.index')->with('message','کاربر با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
