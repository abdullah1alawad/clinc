<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ChangePhotoRequest;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Process;

use App\Models\Subprocess_mark;
use App\Models\Subject;
use App\Models\User;
use App\Traits\GlobalFunctions;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use GlobalFunctions;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    //////////////////////////////////////// student section ////////////////////////////////////////////////
    public function studentProfile(Request $request)
    {
        $user = auth()->user();
        $subjects = Subject::all();

        $selected_subject = $request->query('subject');
        $current_time = Carbon::now();
        $upcomingAppointments = $user->studentProcesses()->where('date', '>=', $current_time)->get();

        if ($selected_subject) {
            $completedAppointments = $user->studentProcesses()->where('date', '<', $current_time)->where('subject_id', $selected_subject)->paginate(5)->fragment('completedAppointments');
        } else {
            $completedAppointments = $user->studentProcesses()->where('date', '<', $current_time)->paginate(5)->fragment('completedAppointments');
        }

        $studentMarks = $user->studentMarks()->paginate(5)->fragment('subjectsMark');

        foreach ($upcomingAppointments as $appointment) {

            $date_from_database = Carbon::parse($appointment->date);
            $time_difference = $current_time->diffForHumans($date_from_database);

            $doctor_name = $appointment->doctor->name;
            $patient_name = $appointment->patient->name;
            $assistant_name = $appointment->assistant->name;
            $subject_name = $appointment->subject->name;

            $appointment->time_difference = $time_difference;
            $appointment->doctor_name = $doctor_name;
            $appointment->patient_name = $patient_name;
            $appointment->assistant_name = $assistant_name;
            $appointment->subject_name = $subject_name;
            $appointment->date = Carbon::parse($appointment->date)->format('Y-m-d');
        }

        foreach ($completedAppointments as $appointment) {

            $date_from_database = Carbon::parse($appointment->date);
            $time_difference = $current_time->diffForHumans($date_from_database);

            $doctor_name = $appointment->doctor->name;
            $patient_name = $appointment->patient->name;
            $assistant_name = $appointment->assistant->name;
            $subject_name = $appointment->subject->name;

            $appointment->time_difference = $time_difference;
            $appointment->doctor_name = $doctor_name;
            $appointment->patient_name = $patient_name;
            $appointment->assistant_name = $assistant_name;
            $appointment->subject_name = $subject_name;
            $appointment->date = Carbon::parse($appointment->date)->format('Y-m-d');
        }

        foreach ($studentMarks as $mark) {
            $subject_name = $mark->subject->name;

            $mark->subject_name = $subject_name;
        }

        return view('student.profile', compact('user', 'upcomingAppointments', 'completedAppointments', 'subjects', 'studentMarks'));
    }

    public function showSubprocessMark($process_id)
    {
        $process = Process::find($process_id);
        $process_mark = $process->marks;

        $total_mark = 0;
        foreach ($process_mark as $mark)
            $total_mark += $mark->mark;
        $process_mark->total_mark = $total_mark;

        return view('student.showSubprocessMark', compact('process_mark'));
    }

    public function studentProfileEdit(){
        $user = auth()->user();

        return view('student.editProfile', compact('user'));
    }

    public function studentProfileUpdate(UpdateRequest $request){
        $user = auth()->user();

        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->national_id=$request->input('national_id');
        $user->gender=$request->input('gender');
        $user->phone=$request->input('phone');

        $user->save();

        return redirect()->route('student.edit.profile')
            ->with('success', 'Your Profile Has Been Updated Successfully!');

    }

    public function studentChangePassword(ChangePasswordRequest $request){
        $user=auth()->user();

        $user->password= Hash::make($request->input('newPassword'));

        $user->save();

        return redirect()->route('student.edit.profile')
            ->with('success', 'Your Password Has Been Updated Successfully!');
    }

    public function studentChangePhoto(ChangePhotoRequest $request){
        $user = auth()->user();


        $photoBath=saveImage( $request->file('photo'),'images');

        $user->photo=$photoBath;

        $user->save();

        return redirect()->route('student.edit.profile')
            ->with('success', 'Your Profile Photo Has Been Updated Successfully!');
    }


    //////////////////////////////////////// end student section /////////////////////////////////////////////

    /////////////////////////////////////// doctor section //////////////////////////////////////////////////
    public function doctorProfile(Request $request)
    {
        $user = auth()->user();
        $subjects = Subject::all();

        $selected_subject = $request->query('subject');
        $current_time = Carbon::now();
        $upcomingAppointments = $user->doctorProcesses()->where('date', '>=', $current_time)->get();

        if ($selected_subject) {
            $completedAppointments = $user->doctorProcesses()->where('date', '<', $current_time)->where('subject_id', $selected_subject)->paginate(5)->fragment('completedAppointments');
        } else {
            $completedAppointments = $user->doctorProcesses()->where('date', '<', $current_time)->paginate(5)->fragment('completedAppointments');
        }

        foreach ($upcomingAppointments as $appointment) {

            $date_from_database = Carbon::parse($appointment->date);
            $time_difference = $current_time->diffForHumans($date_from_database);

            $student_name = $appointment->student->name;
            $patient_name = $appointment->patient->name;
            $assistant_name = $appointment->assistant->name;
            $subject_name = $appointment->subject->name;

            $appointment->time_difference = $time_difference;
            $appointment->student_name = $student_name;
            $appointment->patient_name = $patient_name;
            $appointment->assistant_name = $assistant_name;
            $appointment->subject_name = $subject_name;
            $appointment->date = Carbon::parse($appointment->date)->format('Y-m-d');
        }


        foreach ($completedAppointments as $appointment) {

            $date_from_database = Carbon::parse($appointment->date);
            $time_difference = $current_time->diffForHumans($date_from_database);

            $student_name = $appointment->student->name;
            $patient_name = $appointment->patient->name;
            $assistant_name = $appointment->assistant->name;
            $subject_name = $appointment->subject->name;

            $appointment->time_difference = $time_difference;
            $appointment->student_name = $student_name;
            $appointment->patient_name = $patient_name;
            $appointment->assistant_name = $assistant_name;
            $appointment->subject_name = $subject_name;
            $appointment->date = Carbon::parse($appointment->date)->format('Y-m-d');
        }

        return view('doctor.profile', compact('user', 'upcomingAppointments', 'completedAppointments', 'subjects'));
    }

    public function doctorProfileEdit()
    {
        $user = auth()->user();

        return view('doctor.edit-profile', compact('user'));
    }

    public function doctorProfileUpdate(UpdateRequest $request)
    {
        $user=auth()->user();

        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->national_id=$request->input('national_id');
        $user->gender=$request->input('gender');
        $user->phone=$request->input('phone');

        $user->save();
        return redirect()->route('doctor.profile.edit')
            ->with('success', 'Your Profile Has Been Updated Successfully!');
    }

    public function doctorChangePhoto(ChangePhotoRequest $request)
    {
        $user=auth()->user();

        if($request->hasFile('photo'))
        {
            $url=saveImage($request->file('photo'),'images');
            $user->photo=$url;
        }
        $user->save();
        return redirect()->route('doctor.profile.edit')
            ->with('success', 'Your Profile Photo Has Been Updated Successfully!');
    }

    public function doctorChangePassword(ChangePasswordRequest $request)
    {
        $user=auth()->user();

        $user->password=Hash::make($request->input('newPassword'));

        $user->save();
        return redirect()->route('doctor.profile.edit')
            ->with('success', 'Your Password Has Been Updated Successfully!');
    }

    public function doctorSearchPage()
    {
        $users = User::paginate(5)->fragment('users');
        return view('doctor.search-student',compact('users'));
    }

    public function doctorSearchStudent(SearchRequest $request)
    {
        $national_id = $request->national_id;

        if ($national_id) {
            // Search query is present, perform the search
            $users = User::where('national_id', 'LIKE', '%' . $national_id . '%')->paginate(5)->appends(['national_id' => $national_id]);
        } else {
            // No search query, show all users
            $users = User::paginate(5)->fragment('users');
        }

        return view('doctor.search-student', compact('users'));
    }


    public function doctorShowStudent($id,Request $request)
    {
        $user = User::find($id);
        $subjects = Subject::all();

        $selected_subject = $request->query('subject');
        $current_time = Carbon::now();
        $upcomingAppointments = $user->studentProcesses()->where('date', '>=', $current_time)->get();

        if ($selected_subject) {
            $completedAppointments = $user->studentProcesses()->where('date', '<', $current_time)->where('subject_id', $selected_subject)->paginate(5)->fragment('completedAppointments');
        } else {
            $completedAppointments = $user->studentProcesses()->where('date', '<', $current_time)->paginate(5)->fragment('completedAppointments');
        }

        $studentMarks = $user->studentMarks()->paginate(5)->fragment('subjectsMark');

        foreach ($upcomingAppointments as $appointment) {

            $date_from_database = Carbon::parse($appointment->date);
            $time_difference = $current_time->diffForHumans($date_from_database);
            $student_name = $appointment->student->name;
            $doctor_name = $appointment->doctor->name;
            $patient_name = $appointment->patient->name;
            $assistant_name = $appointment->assistant->name;
            $subject_name = $appointment->subject->name;

            $appointment->time_difference = $time_difference;
            $appointment->student_name = $student_name;
            $appointment->doctor_name = $doctor_name;
            $appointment->patient_name = $patient_name;
            $appointment->assistant_name = $assistant_name;
            $appointment->subject_name = $subject_name;
            $appointment->date = Carbon::parse($appointment->date)->format('Y-m-d');
        }

        foreach ($completedAppointments as $appointment) {

            $date_from_database = Carbon::parse($appointment->date);
            $time_difference = $current_time->diffForHumans($date_from_database);
            $student_name = $appointment->student->name;
            $doctor_name = $appointment->doctor->name;
            $patient_name = $appointment->patient->name;
            $assistant_name = $appointment->assistant->name;
            $subject_name = $appointment->subject->name;

            $appointment->student_name = $student_name;
            $appointment->time_difference = $time_difference;
            $appointment->doctor_name = $doctor_name;
            $appointment->patient_name = $patient_name;
            $appointment->assistant_name = $assistant_name;
            $appointment->subject_name = $subject_name;
            $appointment->date = Carbon::parse($appointment->date)->format('Y-m-d');
        }

        foreach ($studentMarks as $mark) {
            $subject_name = $mark->subject->name;

            $mark->subject_name = $subject_name;
        }

        return view('doctor.show-student', compact('user', 'upcomingAppointments', 'completedAppointments', 'subjects', 'studentMarks'));
    }

    ///////////////////////////////////// end doctor section /////////////////////////////////////////////


    /////////////////////////////////////// assistant section //////////////////////////////////////////////////
    public function assistantProfile(Request $request)
    {
        $user = auth()->user();
        $subjects = Subject::all();

        $selected_subject = $request->query('subject');
        $current_time = Carbon::now();
        $upcomingAppointments = $user->assistantProcesses()->where('date', '>=', $current_time)->get();

        if ($selected_subject) {
            $completedAppointments = $user->assistantProcesses()->where('date', '<', $current_time)->where('subject_id', $selected_subject)->paginate(5)->fragment('completedAppointments');
        } else {
            $completedAppointments = $user->assistantProcesses()->where('date', '<', $current_time)->paginate(5)->fragment('completedAppointments');
        }

        foreach ($upcomingAppointments as $appointment) {

            $date_from_database = Carbon::parse($appointment->date);
            $time_difference = $current_time->diffForHumans($date_from_database);

            $student_name = $appointment->student->name;
            $patient_name = $appointment->patient->name;
            $doctor_name = $appointment->doctor->name;
            $subject_name = $appointment->subject->name;

            $appointment->time_difference = $time_difference;
            $appointment->student_name = $student_name;
            $appointment->patient_name = $patient_name;
            $appointment->doctor_name = $doctor_name;
            $appointment->subject_name = $subject_name;
            $appointment->date = Carbon::parse($appointment->date)->format('Y-m-d');
        }


        foreach ($completedAppointments as $appointment) {

            $date_from_database = Carbon::parse($appointment->date);
            $time_difference = $current_time->diffForHumans($date_from_database);

            $student_name = $appointment->student->name;
            $patient_name = $appointment->patient->name;
            $doctor_name = $appointment->doctor->name;
            $subject_name = $appointment->subject->name;

            $appointment->time_difference = $time_difference;
            $appointment->student_name = $student_name;
            $appointment->patient_name = $patient_name;
            $appointment->doctor_name = $doctor_name;
            $appointment->subject_name = $subject_name;
            $appointment->date = Carbon::parse($appointment->date)->format('Y-m-d');
        }

        return view('assistant.profile', compact('user', 'upcomingAppointments', 'completedAppointments', 'subjects'));
    }

    public function assistantProfileEdit()
    {
        $user = auth()->user();

        return view('assistant.edit-profile', compact('user'));
    }

    public function assistantProfileUpdate(UpdateRequest $request)
    {
        $user=auth()->user();

        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->national_id=$request->input('national_id');
        $user->gender=$request->input('gender');
        $user->phone=$request->input('phone');

        $user->save();
        return redirect()->route('assistant.profile.edit')
            ->with('success', 'Your Profile Has Been Updated Successfully!');
    }

    public function assistantChangePhoto(ChangePhotoRequest $request)
    {
        $user=auth()->user();

        if($request->hasFile('photo'))
        {
            $url=saveImage($request->file('photo'),'images');
            $user->photo=$url;
        }
        $user->save();
        return redirect()->route('assistant.profile.edit')
            ->with('success', 'Your Profile Photo Has Been Updated Successfully!');
    }

    public function assistantChangePassword(ChangePasswordRequest $request)
    {
        $user=auth()->user();

        $user->password=Hash::make($request->input('newPassword'));

        $user->save();
        return redirect()->route('assistant.profile.edit')
            ->with('success', 'Your Password Has Been Updated Successfully!');
    }

    ///////////////////////////////////// end assistant section /////////////////////////////////////////////
}

