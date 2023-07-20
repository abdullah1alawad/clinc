<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/student/profile',function (){
    return view('student.profile');
});
Route::get('/student/profile/edit',function (){
    return view('student.editProfile');
});


Route::get('/home',function (){
    return view('home');
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

