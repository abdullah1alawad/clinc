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
        $user=User::where('id',1)->with('student')->first();

        //$userProgress=$user->student->processes()->get();

        //dd($userProgress);
        return view('student.profile',compact('user'));
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
