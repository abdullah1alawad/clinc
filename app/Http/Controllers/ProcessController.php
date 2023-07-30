<?php

namespace App\Http\Controllers;

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


        }
        else if ($t2->gt($currentHour)) {
            $currentDay = Carbon::now();

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
        }
        else if ($t3->gt($currentHour)) {
            $currentDay = Carbon::now();

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
        }
        else {
            $currentDay = Carbon::now();

            $currentDay->setTime($t4->hour, $t4->minute);
            $key = $currentDay->format('Y-m-d H:i');
            $chairProcesses[$key] = [];
            foreach ($chairs as $chair) {
                $chairProcesses[$key][] = $chair->id;
            }
        }


        for ($i = 1; $i <= 29; $i++) {
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

        dd($chairProcesses);


        foreach ($results as $result) {
            $date = $result->date;
            $val = Carbon::parse($date);
            $day = $val->format('D');
            $time = $val->format('h:i');

            $key = $day . $time;
            if (!isset($chairProcesses))
                $chairProcesses[$key] = [];
            $chairProcesses[$key][] = $result->chair_id;
        }

        return view('student.book-process', compact('patient', 'doctors', 'subjects', 'chairProcesses'));
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
    public function destroy(Process $process)
    {
        //
    }
}
