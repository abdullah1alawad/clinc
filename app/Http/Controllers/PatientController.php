<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
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
        return view('patient.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return "hi";
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $patient=Patient::find($id);

        return view('patient.information',compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        //
    }

    public function diseases($id){
        $diseases = Patient::find($id)->diseases;

        return view('patient.diseases',compact('diseases'));
    }

    public function medicines($id){
        $medicines = Patient::find($id)->medicines;

        return view('patient.medicines',compact('medicines'));
    }
}
