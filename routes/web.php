<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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


Route::get('student/profile',[StudentController::class,'profileInfo'])->name('student.profile');
Route::get('student/show/semester/{id}',[StudentController::class,'showSemesterInformation'])->name('student.show.semester');
Route::get('student/semester/marks',[StudentController::class,'showSemesterMarks'])->name('student.semester.marks');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

