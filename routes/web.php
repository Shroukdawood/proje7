<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/login',[AuthController::class,'showlogin'])->name('login');
Route::post('/logincheck',[AuthController::class,'showlogin']);
Route::get('/register',[AuthController::class,'showregister'])->name('register');
Route::post('/register',[AuthController::class,'showregister']);
route::middleware('auth')->group(function(){
    route::get('/dashboard',[AuthController::class,'showdashboard'])->name('dashboard');
route::post('/logout',[AuthController::class,'showdashboard']);
});
