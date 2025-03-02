<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\Admin\SliderController;
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
