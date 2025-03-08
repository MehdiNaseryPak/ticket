<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\MovieGalleryController;
use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function (){
   Route::get('/',[PanelController::class,'index'])->name('admin.panel');
   Route::prefix('categories')->group(function(){
       Route::get('/',[CategoryController::class,'index'])->name('admin.categories.index');
       Route::get('/create',[CategoryController::class,'create'])->name('admin.categories.create');
       Route::post('/store',[CategoryController::class,'store'])->name('admin.categories.store');
       Route::get('/edit/{category}',[CategoryController::class,'edit'])->name('admin.categories.edit');
       Route::put('/update/{category}',[CategoryController::class,'update'])->name('admin.categories.update');
       Route::delete('/delete/{category}',[CategoryController::class,'delete'])->name('admin.categories.delete');
   });
   Route::prefix('sliders')->group(function(){
       Route::get('/',[SliderController::class,'index'])->name('admin.sliders.index');
       Route::get('/create',[SliderController::class,'create'])->name('admin.sliders.create');
       Route::post('/store',[SliderController::class,'store'])->name('admin.sliders.store');
       Route::get('/edit/{slider}',[SliderController::class,'edit'])->name('admin.sliders.edit');
       Route::put('/update/{slider}',[SliderController::class,'update'])->name('admin.sliders.update');
       Route::delete('/delete/{slider}',[SliderController::class,'delete'])->name('admin.sliders.delete');
   });
   Route::prefix('users')->group(function(){
       Route::get('/',[UserController::class,'index'])->name('admin.users.index');
       Route::get('/create',[UserController::class,'create'])->name('admin.users.create');
       Route::post('/store',[UserController::class,'store'])->name('admin.users.store');
       Route::get('/edit/{user}',[UserController::class,'edit'])->name('admin.users.edit');
       Route::put('/update/{user}',[UserController::class,'update'])->name('admin.users.update');
       Route::delete('/delete/{user}',[UserController::class,'delete'])->name('admin.users.delete');
   });
   Route::prefix('positions')->group(function(){
       Route::get('/',[PositionController::class,'index'])->name('admin.positions.index');
       Route::get('/create',[PositionController::class,'create'])->name('admin.positions.create');
       Route::post('/store',[PositionController::class,'store'])->name('admin.positions.store');
       Route::get('/edit/{position}',[PositionController::class,'edit'])->name('admin.positions.edit');
       Route::put('/update/{position}',[PositionController::class,'update'])->name('admin.positions.update');
       Route::delete('/delete/{position}',[PositionController::class,'delete'])->name('admin.positions.delete');
   });
   Route::prefix('movies')->group(function(){
       Route::get('/',[MovieController::class,'index'])->name('admin.movies.index');
       Route::get('/create',[MovieController::class,'create'])->name('admin.movies.create');
       Route::post('/store',[MovieController::class,'store'])->name('admin.movies.store');
       Route::get('/edit/{movie}',[MovieController::class,'edit'])->name('admin.movies.edit');
       Route::put('/update/{movie}',[MovieController::class,'update'])->name('admin.movies.update');
       Route::delete('/delete/{movie}',[MovieController::class,'delete'])->name('admin.movies.delete');
       Route::prefix('galleries')->group(function(){
           Route::get('/{movie}',[MovieGalleryController::class,'index'])->name('admin.movies.gallery.index');
           Route::get('/create/{movie}',[MovieGalleryController::class,'create'])->name('admin.movies.gallery.create');
           Route::post('/store/{movie}',[MovieGalleryController::class,'store'])->name('admin.movies.gallery.store');
       });
   });
});






Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
