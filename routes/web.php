<?php

use App\Http\Controllers\UserController;
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


Route::get('/home',function (){
    return view('home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//////////////////////student routes///////////////////

Route::group(['prefix' => 'student' , 'middleware' => 'auth'],function(){

    Route::get('/profile',[UserController::class, 'studentProfile'])->name('student.profile');
    Route::get('/profile/edit',[UserController::class, 'studentProfileEdit'])->name('student.edit.profile');
});

/////////////////////end student routes//////////////////


//////////////////////doctor routes///////////////////

Route::group(['prefix' => 'doctor' , 'middleware' => 'auth'],function(){

    Route::get('/profile',[UserController::class, 'doctorProfile'])->name('doctor.profile');
    Route::get('/profile/edit',[UserController::class, 'studentProfileEdit'])->name('student.edit.profile');
});

/////////////////////end doctor routes//////////////////
