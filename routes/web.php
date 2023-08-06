<?php

use App\Http\Controllers\ChairController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\SubjectController;
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


Route::get('/home', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

////////////////////// messages action /////////////



////////////////////// end messages action /////////////


////////////////////// notification //////////////////////////////////////



////////////////////// end  notification //////////////////////////////////////

//////////////////////banned and pending/////////////////////////////////////////

Route::get('/pending', [UserController::class, 'pending'])->name('pending')->middleware('auth');
Route::get('/banned', [UserController::class, 'banned'])->name('banned')->middleware('auth');

//////////////////////end banned and pending //////////////////////////////////////


////////////////////// admin routes //////////////////

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {

    Route::get('/profile', [UserController::class, 'adminProfile'])->name('admin.profile');
    Route::get('/profile/edit', [UserController::class, 'adminProfileEdit'])->name('admin.edit.profile');
    Route::post('/profile/update', [UserController::class, 'adminProfileUpdate'])->name('admin.update.profile');
    Route::post('/profile/change-password', [UserController::class, 'adminChangePassword'])->name('admin.change.password');
    Route::get('/profile/add-admin', [UserController::class, 'addAdmin'])->name('add.admin');
    Route::post('/profile/store-existing-admin', [UserController::class, 'storeExistingAdmin'])->name('store.existing.admin');
    Route::post('/profile/store-new-admin', [UserController::class, 'storeNewAdmin'])->name('store.new.admin');
    Route::get('/profile/add-subject', [SubjectController::class, 'addSubject'])->name('add.subject');
    Route::post('/profile/store-subject', [SubjectController::class, 'storeSubject'])->name('store.subject');
    Route::get('/profile/add-clinic', [ClinicController::class, 'addClinic'])->name('add.clinic');
    Route::post('/profile/store-Clinic', [ClinicController::class, 'storeClinic'])->name('store.clinic');
    Route::get('/profile/add-chair', [ChairController::class, 'addChair'])->name('add.chair');
    Route::post('/profile/store-chair', [chairController::class, 'storeChair'])->name('store.chair');
    Route::post('/mark-notification', [UserController::class, 'adminMarkNotification'])->name('admin.mark.notification');
    Route::get('/message-info/{msg_id}', [UserController::class, 'adminShowMessage'])->name('admin.message.info');
    Route::get('/accept/{id}/{type}', [UserController::class, 'userAccept'])->name('user.accept');
    Route::get('/reject/{id}/{type}', [UserController::class, 'userReject'])->name('user.reject');
});

////////////////////// end admin routes //////////////////

//////////////////////student routes///////////////////

Route::group(['prefix' => 'student', 'middleware' => ['auth','student']], function () {

    Route::get('/profile', [UserController::class, 'studentProfile'])->name('student.profile');
    Route::get('/profile/edit', [UserController::class, 'studentProfileEdit'])->name('student.edit.profile');
    Route::post('/profile/update', [UserController::class, 'studentProfileUpdate'])->name('student.update.profile');
    Route::post('/profile/change-password', [UserController::class, 'studentChangePassword'])->name('student.change.password');
    Route::post('/profile/change-photo', [UserController::class, 'studentChangePhoto'])->name('student.change.photo');
    Route::get('/profile/sub-mark/{id}', [UserController::class, 'showSubprocessMark'])->name('student.showSubprocessMark');
    Route::get('/profile/book/process/{id}', [ProcessController::class, 'index'])->name('book.process');
    Route::post('/profile/book/process/store', [ProcessController::class, 'store'])->name('book.process.store');
    Route::post('/mark-notification', [UserController::class, 'studentMarkNotification'])->name('student.mark.notification');
    Route::get('/message-info/{msg_id}', [UserController::class, 'studentShowMessage'])->name('student.message.info');
});

/////////////////////end student routes//////////////////


//////////////////////doctor routes///////////////////

Route::group(['prefix' => 'doctor', 'middleware' => ['auth','doctor']], function () {

    Route::get('/profile', [UserController::class, 'doctorProfile'])->name('doctor.profile');
    Route::get('/profile/edit', [UserController::class, 'doctorProfileEdit'])->name('doctor.profile.edit');
    Route::put('/profile/update', [UserController::class, 'doctorProfileUpdate'])->name('doctor.profile.update');
    Route::put('/profile/change-password', [UserController::class, 'doctorChangePassword'])->name('doctor.change.password');
    Route::put('/profile/change-photo', [UserController::class, 'doctorChangePhoto'])->name('doctor.change.photo');
    Route::get('/profile/set-sub-marks/{id}', [SubprocessMarkController::class, 'create'])->name('doctor.setSubmarks');
    Route::post('/profile/store-sub-marks', [SubprocessMarkController::class, 'store'])->name('doctor.storeSubmarks');
    Route::delete('/profile/delete-sub-marks/{id}', [SubprocessMarkController::class, 'destroy'])->name('doctor.deleteSubmarks');
    Route::post('/mark-notification', [UserController::class, 'doctorMarkNotification'])->name('doctor.mark.notification');
    Route::get('/message-info/{msg_id}', [UserController::class, 'doctorShowMessage'])->name('doctor.message.info');
    Route::post('/process-accept', [ProcessController::class, 'processAccept'])->name('process.accept');
    Route::get('/process-reject/{process_id}',[ProcessController::class, 'processReject'])->name('process.reject');
});

/////////////////////end doctor routes//////////////////


////////////////////search routes/////////////////////////////

Route::group(['prefix' => 'search', 'middleware' => 'auth'], function () {

    Route::get('/student/page', [UserController::class, 'searchStudentPage'])->name('search.student.page')->middleware('admin.doctor');
    Route::get('/student', [UserController::class, 'searchStudent'])->name('search.student')->middleware('admin.doctor');
    Route::get('/show/student/{id}', [UserController::class, 'showStudent'])->name('show.student')->middleware('admin.doctor');
    Route::get('/patient/page/{id}', [PatientController::class, 'searchPatientPage'])->name('search.patient.page')->middleware('notAssistant');
    Route::get('/patient', [PatientController::class, 'searchPatient'])->name('search.patient')->middleware('notAssistant');
    Route::get('/show/patient/{id}', [PatientController::class, 'showPatient'])->name('show.patient')->middleware('notAssistant');

});


///////////////////end search routes //////////////////////////////

//////////////////////assistant routes///////////////////

Route::group(['prefix' => 'assistant', 'middleware' => ['auth','assistant']], function () {

    Route::get('/profile', [UserController::class, 'assistantProfile'])->name('assistant.profile');
    Route::get('/profile/edit', [UserController::class, 'assistantProfileEdit'])->name('assistant.profile.edit');
    Route::put('/profile/update', [UserController::class, 'assistantProfileUpdate'])->name('assistant.profile.update');
    Route::put('/profile/change-password', [UserController::class, 'assistantChangePassword'])->name('assistant.change.password');
    Route::put('/profile/change-photo', [UserController::class, 'assistantChangePhoto'])->name('assistant.change.photo');
    Route::post('/mark-notification', [UserController::class, 'assistantMarkNotification'])->name('assistant.mark.notification');
    Route::get('/message-info/{msg_id}', [UserController::class, 'assistantShowMessage'])->name('assistant.message.info');
});

/////////////////////end assistant routes//////////////////

//////////////////// patient routes ////////////////////

Route::group(['prefix' => 'patient', ['middleware' => 'auth','notAssistant']], function () {

    Route::get('/information/{id}', [PatientController::class, 'show'])->name('patient.information');
    Route::get('/diseases/{id}', [PatientController::class, 'diseases'])->name('patient.diseases');
    Route::get('/medicines/{id}', [PatientController::class, 'medicines'])->name('patient.medicines');
    Route::get('/create', [PatientController::class, 'create'])->name('patient.create');
    Route::post('/store', [PatientController::class, 'store'])->name('patient.store');
});

//////////////////// end patient routes ////////////////////


/////////////////// test /////////////////////////
//Route::get('/test/{id}',[ProcessController::class,'index']);
//Route::get('/test',[UserController::class,'showDoctorNotifications']);

//Route::get('/test',function (){
//
//});


//Route::post('/store',[PatientController::class, 'test'])->name('patient.test');
/////////////////// end test /////////////////////////
