<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubjectRequest;
use App\Models\Clinic;
use Illuminate\Http\Request;

class ClinicController extends Controller
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
    public function show(Clinic $clinic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Clinic $clinic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Clinic $clinic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clinic $clinic)
    {
        //
    }

    public function addClinic(){
        return view('admin.addClinic');
    }

    public function storeClinic(StoreSubjectRequest $request){

        $clinic=Clinic::where('name',$request->input('name'))->first();
        if($clinic)
            return redirect()->route('add.clinic')
                ->with('field', 'Clinic is Already exist');

        Clinic::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('add.clinic')
            ->with('success', 'Clinic Has Been Added Successfully!');

    }
}
