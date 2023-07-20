<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DoctorController;

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


//Route::get('student/profile',[StudentController::class,'profileInfo'])->name('student.profile');
//Route::get('student/show/semester/{id}',[StudentController::class,'showSemesterInformation'])->name('student.show.semester');
//Route::get('student/semester/marks',[StudentController::class,'showSemesterMarks'])->name('student.semester.marks');
//
//Auth::routes();
//
//Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
//Route::post('/student/store', [StudentController::class, 'store'])->name('student.store');
//Route::get('/doctor/create', [DoctorController::class, 'create'])->name('doctor.create');
//Route::post('/doctor/store', [DoctorController::class, 'store'])->name('doctor.store');
//Route::get('/home', [HomeController::class, 'index'])->name('home');

