<?php

use App\Http\Controllers\Api\V1\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function(){
    Route::post('send_sms' , [AuthController::class,'sendSMS'])->name('send_sms');
    Route::post('login_or_register' , [AuthController::class,'loginOrRegister'])->name('login_or_register');
});
