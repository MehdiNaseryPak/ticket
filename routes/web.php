<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PanelController;
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
