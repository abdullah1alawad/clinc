<?php

namespace App\Http\Controllers;

use App\Models\Process;
use App\Models\Student;
use App\Models\User;
use App\Traits\GlobalFunctions;
use Illuminate\Http\Request;

class StudentController extends Controller
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
    public function show(Student $student)
    {
        //
    }
    //-----------------------

    public function profileInfo()
    {
        $allUserSubjects=[];
        $semesterUserSubjects=[];
        $user=User::where('id',2)->with('student')->first();

        $allUserProgress=Student::find(2)->processes()->get();

        $semesterUserProgress=Student::with(['processes'=>function ($q) use ($user){
            $q->where('level',$user->student->level);
            $q->where('semester',$user->student->semester);
        }])->find(2);

        foreach ($semesterUserProgress->processes as $progress){
            $subject=$progress->subject;
            if(isset($semesterUserSubjects[$subject->name]))
                $semesterUserSubjects[$subject->name]++;
            else
                $semesterUserSubjects[$subject->name]=1;
        }

        foreach ($allUserProgress as $progress){
            $subject=$progress->subject;
            if(isset($allUserSubjects[$subject->name]))
                $allUserSubjects[$subject->name]++;
            else
                $allUserSubjects[$subject->name]=1;
        }


        return view('student.profile',compact('user','allUserSubjects','semesterUserSubjects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
