<?php

namespace App\Http\Controllers;

use App\Models\Process;
use App\Models\Subject;
use App\Traits\GlobalFunctions;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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


        return view('student.profile', compact('user', 'upcomingAppointments', 'completedAppointments', 'subjects'));
    }

    public function studentProfileEdit()
    {
        $user = auth()->user();

        return view('student.editProfile', compact('user'));
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
}
