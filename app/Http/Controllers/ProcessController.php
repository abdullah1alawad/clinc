<?php

namespace App\Http\Controllers;

use App\Events\ProcessAccepted;
use App\Events\ProcessCreated;
use App\Events\ProcessRejected;
use App\Events\StudentProcessCanceling;
use App\Http\Requests\BookProcessRequest;
use App\Models\Chair;
use App\Models\Clinic;
use App\Models\Patient;
use App\Models\Process;
use App\Models\Subject;
use App\Models\Subprocess_mark;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use function Symfony\Component\HttpKernel\Log\format;

class ProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $patient = Patient::find($id);
        $doctors = User::whereHas('roles', function ($q) {
            $q->where('name', 'doctor');
        })->get();
        $subjects = Subject::all();

        $chairs = Chair::all();
        $currentTime = Carbon::now();
        $results = Process::where('date', '>', $currentTime)->select('chair_id', 'date')->get();
        $currentHour = Carbon::parse($currentTime)->format('h:i A');

        $t1 = Carbon::parse('09:00 am');
        $t2 = Carbon::parse('10:30 am');
        $t3 = Carbon::parse('12:00 pm');
        $t4 = Carbon::parse('01:30 pm');


        $chairProcesses = [];
        if ($t1->gt($currentHour)) {
            $currentDay = Carbon::now();

            $currentDay->setTime($t1->hour, $t1->minute);
            $key = $currentDay->format('Y-m-d H:i');
            $chairProcesses[$key] = [];
            foreach ($chairs as $chair) {
                $chairProcesses[$key][] = $chair->id;
            }

            $currentDay->setTime($t2->hour, $t2->minute);
            $key = $currentDay->format('Y-m-d H:i');
            $chairProcesses[$key] = [];
            foreach ($chairs as $chair) {
                $chairProcesses[$key][] = $chair->id;
            }

            $currentDay->setTime($t3->hour, $t3->minute);
            $key = $currentDay->format('Y-m-d H:i');
            $chairProcesses[$key] = [];
            foreach ($chairs as $chair) {
                $chairProcesses[$key][] = $chair->id;
            }

            $currentDay->setTime($t4->hour, $t4->minute);
            $key = $currentDay->format('Y-m-d H:i');
            $chairProcesses[$key] = [];
            foreach ($chairs as $chair) {
                $chairProcesses[$key][] = $chair->id;
            }


        } else if ($t2->gt($currentHour)) {
            $currentDay = Carbon::now();

            $currentDay->setTime($t1->hour, $t1->minute);
            $key = $currentDay->format('Y-m-d H:i');
            $chairProcesses[$key] = [];
            $chairProcesses[$key][] = -1;

            $currentDay->setTime($t2->hour, $t2->minute);
            $key = $currentDay->format('Y-m-d H:i');
            $chairProcesses[$key] = [];
            foreach ($chairs as $chair) {
                $chairProcesses[$key][] = $chair->id;
            }

            $currentDay->setTime($t3->hour, $t3->minute);
            $key = $currentDay->format('Y-m-d H:i');
            $chairProcesses[$key] = [];
            foreach ($chairs as $chair) {
                $chairProcesses[$key][] = $chair->id;
            }

            $currentDay->setTime($t4->hour, $t4->minute);
            $key = $currentDay->format('Y-m-d H:i');
            $chairProcesses[$key] = [];
            foreach ($chairs as $chair) {
                $chairProcesses[$key][] = $chair->id;
            }
        } else if ($t3->gt($currentHour)) {
            $currentDay = Carbon::now();

            $currentDay->setTime($t1->hour, $t1->minute);
            $key = $currentDay->format('Y-m-d H:i');
            $chairProcesses[$key] = [];
            $chairProcesses[$key][] = -1;

            $currentDay->setTime($t2->hour, $t2->minute);
            $key = $currentDay->format('Y-m-d H:i');
            $chairProcesses[$key] = [];
            $chairProcesses[$key][] = -1;

            $currentDay->setTime($t3->hour, $t3->minute);
            $key = $currentDay->format('Y-m-d H:i');
            $chairProcesses[$key] = [];
            foreach ($chairs as $chair) {
                $chairProcesses[$key][] = $chair->id;
            }

            $currentDay->setTime($t4->hour, $t4->minute);
            $key = $currentDay->format('Y-m-d H:i');
            $chairProcesses[$key] = [];
            foreach ($chairs as $chair) {
                $chairProcesses[$key][] = $chair->id;
            }
        } elseif ($t4->gt($currentHour)) {
            $currentDay = Carbon::now();

            $currentDay->setTime($t1->hour, $t1->minute);
            $key = $currentDay->format('Y-m-d H:i');
            $chairProcesses[$key] = [];
            $chairProcesses[$key][] = -1;

            $currentDay->setTime($t2->hour, $t2->minute);
            $key = $currentDay->format('Y-m-d H:i');
            $chairProcesses[$key] = [];
            $chairProcesses[$key][] = -1;

            $currentDay->setTime($t3->hour, $t3->minute);
            $key = $currentDay->format('Y-m-d H:i');
            $chairProcesses[$key] = [];
            $chairProcesses[$key][] = -1;

            $currentDay->setTime($t4->hour, $t4->minute);
            $key = $currentDay->format('Y-m-d H:i');
            $chairProcesses[$key] = [];
            foreach ($chairs as $chair) {
                $chairProcesses[$key][] = $chair->id;
            }
        } else {
            $currentDay = Carbon::now();

            $currentDay->setTime($t1->hour, $t1->minute);
            $key = $currentDay->format('Y-m-d H:i');
            $chairProcesses[$key] = [];
            $chairProcesses[$key][] = -1;

            $currentDay->setTime($t2->hour, $t2->minute);
            $key = $currentDay->format('Y-m-d H:i');
            $chairProcesses[$key] = [];
            $chairProcesses[$key][] = -1;

            $currentDay->setTime($t3->hour, $t3->minute);
            $key = $currentDay->format('Y-m-d H:i');
            $chairProcesses[$key] = [];
            $chairProcesses[$key][] = -1;

            $currentDay->setTime($t4->hour, $t4->minute);
            $key = $currentDay->format('Y-m-d H:i');
            $chairProcesses[$key] = [];
            $chairProcesses[$key][] = -1;
        }


        for ($i = 1; $i <= 27; $i++) {
            $currentDay = Carbon::now();
            $currentDay->addDays($i);

            $currentDay->setTime($t1->hour, $t1->minute);
            $key = $currentDay->format('Y-m-d H:i');
            if (!isset($chairProcesses[$key]))
                $chairProcesses[$key] = [];
            foreach ($chairs as $chair) {
                $chairProcesses[$key][] = $chair->id;
            }

            $currentDay->setTime($t2->hour, $t2->minute);
            $key = $currentDay->format('Y-m-d H:i');
            if (!isset($chairProcesses[$key]))
                $chairProcesses[$key] = [];
            foreach ($chairs as $chair) {
                $chairProcesses[$key][] = $chair->id;
            }

            $currentDay->setTime($t3->hour, $t3->minute);
            $key = $currentDay->format('Y-m-d H:i');
            if (!isset($chairProcesses[$key]))
                $chairProcesses[$key] = [];
            foreach ($chairs as $chair) {
                $chairProcesses[$key][] = $chair->id;
            }

            $currentDay->setTime($t4->hour, $t4->minute);
            $key = $currentDay->format('Y-m-d H:i');
            if (!isset($chairProcesses[$key]))
                $chairProcesses[$key] = [];
            foreach ($chairs as $chair) {
                $chairProcesses[$key][] = $chair->id;
            }
        }

        foreach ($results as $result) {
            $date = Carbon::parse($result->date)->format('Y-m-d H:i');
            $ind = array_search($result->chair_id, $chairProcesses[$date]);

            unset($chairProcesses[$date][$ind]);

        }

        $week1 = [];
        $week2 = [];
        $week3 = [];
        $week4 = [];

        $cnt = 1;
        foreach ($chairProcesses as $key => $value) {
            if ($cnt <= 28) {
                $week1[$key] = [];
                foreach ($value as $item)
                    $week1[$key][] = $item;
            } else if ($cnt <= 56) {
                $week2[$key] = [];
                foreach ($value as $item)
                    $week2[$key][] = $item;
            } else if ($cnt <= 84) {
                $week3[$key] = [];
                foreach ($value as $item)
                    $week3[$key][] = $item;
            } else {
                $week4[$key] = [];
                foreach ($value as $item)
                    $week4[$key][] = $item;
            }
            $cnt++;
        }

        //return view('student.test',compact('week1','week2','week3','week4'));

        return view('student.book-process', compact('patient', 'doctors', 'subjects', 'week1', 'week2', 'week3', 'week4'));
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
    public function store(BookProcessRequest $request)
    {
        $user_id = auth()->user()->id;

        $photoPath = "";
        if ($request->hasFile('photo'))
            $photoPath = saveImage($request->file('photo'), 'images/');

        $process = new Process;
        $process->student_id = $user_id;
        $process->patient_id = $request->input('patient_id');
        $process->doctor_id = $request->input('doctor_id');
        $process->subject_id = $request->input('subject_id');
        $process->chair_id = $request->input('chair_id');
        $process->date = $request->input('date');
        $process->photo = $photoPath;
        $process->status = 0;
        $process->save();

        event(new ProcessCreated($process));

        return redirect()->route('student.profile')->with('success', 'Your request has been successfully submitted.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Process $process)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Process $process)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Process $process)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, $user_type)
    {
        $process = Process::find($id);

        event(new StudentProcessCanceling($process, $user_type));

        $process->delete();

        return redirect()->back()->with('success', 'Process has been canceled successfully');
    }

    public function processAccept(Request $request)
    {

        $process = Process::find($request->input('process_id'));
        if (!$process)
            return redirect()->back()->with('field', 'The Process Has Already Been Rejected!');

        $process->status = 1;
        $process->assistant_id = $request->input('assistant_id');

        $process->save();

        event(new ProcessAccepted($process));

        return redirect()->route('doctor.profile')->with('success', 'Process Has Been Accepted!');
    }

    public function processReject($id)
    {
        $process = Process::find($id);
        if (!$process)
            return redirect()->back()->with('field', 'The Process Has Already Been Rejected!');

        $currentTime = Carbon::now();
        if ($currentTime->gt($process->date))
            return redirect()->back()->with('field', 'The Process Has Already Been Completed!');

        event(new ProcessRejected($process));

        $process->delete();

        return redirect()->route('doctor.profile')->with('success', 'Process Has Been Rejected!');
    }
}
