<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubjectRequest;
use App\Models\Chair;
use App\Models\Clinic;
use Illuminate\Http\Request;

class ChairController extends Controller
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
    public function show(Chair $chair)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chair $chair)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chair $chair)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chair $chair)
    {
        //
    }

    public function addChair(){
        return view('admin.addChair');
    }

    public function storeChair(StoreSubjectRequest $request){

        $clinic=Clinic::where('name',$request->input('name'))->first();

        if(!$clinic)
            return redirect()->route('add.chair')
                ->with('field', 'Clinic Not Found');

        Chair::create([
           'clinic_id'=>$clinic->id,
        ]);

        return redirect()->route('add.chair')
            ->with('success', 'Chair Has Been Added Successfully!');
    }
}
