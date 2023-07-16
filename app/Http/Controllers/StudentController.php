<?php

namespace App\Http\Controllers;

use App\Models\Process;
use App\Models\Student;
use App\Models\Subprocess_mark;
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
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->user_id=auth()->user()->id;
        
        $errorMessages = [
            'university_id.required'=>'The university id is required.',
            'university_id.max'=>'The university id must be less than or equal to 30 digits.',
            'university_id.regex'=>'The university id can only have numbers.',
            'email.required'=>'The email is required.',
            'email.email'=>'The email is invalid.',
            'email.max'=>'The email must be less than or equal to 30 digits.',
            'level.required'=>'The level is required.',
            'level.between'=>'The level can be number from 1 to 5.',
            'semester.required'=>'The semester is required.',
            'semester.between'=>'The semester can be number from 1 to 3.',
            'user_id.required'=>'you should register or login.',
        ];
        $student=$request->validate([
            'user_id'=>'required',
            'university_id'=>'required|max:30|unique:students|regex:/^[0-9]+$/',
            'email'=>'required|email|max:30|unique:students',
            'level'=>'required|numeric|between:1,5',
            'semester'=>'required|numeric|between:1,3',
        ],$errorMessages);


        Student::create($student);

        return redirect()->route('student.profile');
    }

    /**
     * Display the specified resource.
     */
    public function showSemesterInformation($id)
    {
        $semesterUserInfo=[];
        $processMarks=[];

        $user=User::where('id',$id)->with('student')->first();

        $semesterUserProgress=Student::with(['processes'=>function ($q) use ($user){
            $q->where('level',$user->student->level);
            $q->where('semester',$user->student->semester);
        }])->find($id);

        foreach ($semesterUserProgress->processes as $progress){
            $subject=$progress->subject;
            $doctor=User::find($progress->doctor_user_id);
            $patient=User::find($progress->patient_user_id);
            $assistant=User::find($progress->assistant_user_id);
            $chair=$progress->chair_id;
            $photo=$progress->url;
            $subMarks=Subprocess_mark::where('process_id',$progress->id)->get();
            $sum=0;

            foreach($subMarks as $subMark)
                $sum+=$subMark->mark;
            $processMark=$sum;

            $semesterUserInfo[$subject->name][]=[$doctor,$patient,$assistant,$chair,$photo,$progress->created_at,$processMark];
        }

        return view('student.showSemesterInformation',compact('semesterUserInfo'));
    }

    //------------------------------

    public function showSemesterMarks()
    {
        return view('student.showSemesterMarks');
    }

    //-----------------------

    public function profileInfo()
    {
        $user=auth()->user();

        $allUserSubjects=[];
        $semesterUserSubjects=[];
        $user=User::where('id',$user->id)->with('student')->first();

        $allUserProgress=Student::find($user->id)->processes()->get();

        $semesterUserProgress=Student::with(['processes'=>function ($q) use ($user){
            $q->where('level',$user->student->level);
            $q->where('semester',$user->student->semester);
        }])->find($user->id);

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
