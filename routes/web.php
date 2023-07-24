<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SubprocessMarkController;


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
    Route::post('/profile/update',[UserController::class, 'studentProfileUpdate'])->name('student.update.profile');
    Route::post('/profile/change-password',[UserController::class, 'studentChangePassword'])->name('student.change.password');
    Route::post('/profile/change-photo',[UserController::class, 'studentChangePhoto'])->name('student.change.photo');
    Route::get('/profile/sub-mark/{id}',[UserController::class, 'showSubprocessMark'])->name('student.showSubprocessMark');
});

/////////////////////end student routes//////////////////


//////////////////////doctor routes///////////////////

Route::group(['prefix' => 'doctor' , 'middleware' => 'auth'],function(){

    Route::get('/profile',[UserController::class, 'doctorProfile'])->name('doctor.profile');
    Route::get('/profile/search/page',[UserController::class, 'doctorSearchPage'])->name('doctor.search.page');
    Route::get('/profile/search/student',[UserController::class, 'doctorSearchStudent'])->name('doctor.search.student');
    Route::get('/profile/edit',[UserController::class, 'doctorProfileEdit'])->name('doctor.profile.edit');
    Route::put('/profile/update',[UserController::class, 'doctorProfileUpdate'])->name('doctor.profile.update');
    Route::put('/profile/change-password',[UserController::class, 'doctorChangePassword'])->name('doctor.change.password');
    Route::put('/profile/change-photo',[UserController::class, 'doctorChangePhoto'])->name('doctor.change.photo');
    Route::get('/profile/set-sub-marks/{id}',[SubprocessMarkController::class,'create'])->name('doctor.setSubmarks');
    Route::post('/profile/store-sub-marks',[SubprocessMarkController::class,'store'])->name('doctor.storeSubmarks');
    Route::delete('/profile/delete-sub-marks/{id}',[SubprocessMarkController::class,'destroy'])->name('doctor.deleteSubmarks');
});

/////////////////////end doctor routes//////////////////


//////////////////////assistant routes///////////////////

Route::group(['prefix' => 'assistant' , 'middleware' => 'auth'],function(){

    Route::get('/profile',[UserController::class, 'assistantProfile'])->name('assistant.profile');
    Route::get('/profile/edit',[UserController::class, 'assistantProfileEdit'])->name('assistant.profile.edit');
    Route::put('/profile/update',[UserController::class, 'assistantProfileUpdate'])->name('assistant.profile.update');
    Route::put('/profile/change-password',[UserController::class, 'assistantChangePassword'])->name('assistant.change.password');
    Route::put('/profile/change-photo',[UserController::class, 'assistantChangePhoto'])->name('assistant.change.photo');
});

/////////////////////end assistant routes//////////////////

//////////////////// patient routes ////////////////////

Route::group(['prefix' => 'patient' , 'middleware' => 'auth'],function(){

    Route::get('/information/{id}',[PatientController::class, 'show'])->name('patient.information');
});

//////////////////// end patient routes ////////////////////
