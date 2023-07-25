<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Models\Disease;
use App\Models\Medicine;
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
    public function store(PatientRequest $request)
    {
        $photoPath = saveImage($request->file('signature'), 'images/');

        $patient = Patient::create([
            'name' => $request->input('name'),
            'gender' => $request->input('gender'),
            'national_id' => $request->input('national_id'),
            'birth_date' => $request->input('birth_date'),
            'height' => $request->input('height'),
            'weight' => $request->input('weight'),
            'address' => $request->input('address'),
            'job' => $request->input('job'),
            'phone' => $request->input('phone'),
            'questions' => $request->input('questions'),
            'last_medical_scan_date' => $request->input('last_medical_scan_date'),
            'personal_doctor_name' => $request->input('personal_doctor_name'),
            'currently_disease' => $request->input('currently_disease'),
            'skin_disease' => $request->input('skin_disease'),
            'skin_surgery' => $request->input('skin_surgery'),
            'reason_to_go_hospital' => $request->input('reason_to_go_hospital'),
            'reason_to_transform_blood' => $request->input('reason_to_transform_blood'),
            'skin_tooth_disease' => $request->input('skin_tooth_disease'),
            'reason_to_came' => $request->input('reason_to_came'),
            'signature' => $photoPath,
        ]);

        if ($request->has('other_diseases')) {
            $otherDiseases = $request->input('other_diseases');

            for ($i = 0; $i < count($otherDiseases); $i++) {
                $diseaseRow = new Disease();

                $diseaseRow->name=$otherDiseases[$i];

                $patient->diseases()->save($diseaseRow);
            }
        }

        if ($request->has('other_medicines')) {
            $otherMedicines = $request->input('other_medicines');

            for ($i = 0; $i < count($otherMedicines); $i++) {
                $medicineRow = new Medicine();

                $medicineRow->name=$otherMedicines[$i];

                $patient->medicines()->save($medicineRow);
            }
        }

        return view('patient.information', compact('patient'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $patient = Patient::find($id);

        return view('patient.information', compact('patient'));
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

    public function diseases($id)
    {
        $diseases = Patient::find($id)->diseases;

        return view('patient.diseases', compact('diseases'));
    }

    public function medicines($id)
    {
        $medicines = Patient::find($id)->medicines;

        return view('patient.medicines', compact('medicines'));
    }


    //////////////////////////////
    public function test(Request $request)
    {
        $dis = $request->input('other_diseases');

        $patient = Patient::find(1);

        $disease = new Disease;
        $disease->name = $dis[0];

        $patient->diseases()->save($disease);

        return "done";
    }
}
