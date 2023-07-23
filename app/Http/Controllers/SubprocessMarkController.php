<?php

namespace App\Http\Controllers;

use App\Models\Process;
use App\Models\Subprocess_mark;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class SubprocessMarkController extends Controller
{
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
    public function create($process_id)
    {
        $process = Process::find($process_id);
        $process_mark=$process->marks;
        $student=$process->student;
        $student->process_id=$process_id;

        $total_mark=0;
        foreach ($process_mark as $mark)
            $total_mark += $mark->mark;
        $process_mark->total_mark=$total_mark;

        return view('doctor.set-sub-marks',compact('process_mark','student'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $masseges=[
            'process_id.required'=>'The student_id is required.',
            'process_id.numeric'=>'The student_id can contain numbers only.',
            'name.required'=>'The sub-process name is required.',
            'name.*.string'=>'The name must be a string.',
            'mark.required'=>'The sub-mark filed is required.',
            'mark.*.numeric'=>'The sub-mark can contain numbers only.',
        ];
        $request->validate([
            'process_id'=>'required|numeric',
            'name'=>'required|array',
            'name.*'=>'string',
            'mark'=>'required|array',
            'mark.*'=>'numeric'
        ],$masseges);

        $process=Process::find($request->input('process_id'));

        $subprocessData = [];
        $names = $request->input('name');
        $marks = $request->input('mark');

        for ($i = 0; $i < count($names); $i++)
        {
            $subprocessData[] = [
                'name' => $names[$i],
                'mark' => $marks[$i],
            ];
        }

        foreach ($subprocessData as $data) {
            $subProcessMark = new Subprocess_mark($data);
            $process->marks()->save($subProcessMark);
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Subprocess_mark $subprocess_mark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subprocess_mark $subprocess_mark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subprocess_mark $subprocess_mark)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $subprocess_mark=Subprocess_mark::find($id);
        $subprocess_mark->delete();
        return redirect()->back();
    }
}
