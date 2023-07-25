<?php

namespace App\Http\Controllers;


use App\Http\Requests\PatientRequest;
use App\Models\Disease;
use App\Models\Medicine;
use App\Http\Requests\SearchRequest;
use App\Models\Patient;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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

    public function doctorSearchPatientPage()
    {
        $patients = Patient::paginate(5)->fragment('patients');

        return view('doctor.search-patient',compact('patients'));
    }

    public function doctorSearchPatient(SearchRequest $request)
    {
        $national_id = $request->national_id;

        if ($national_id) {
            // Search query is present, perform the search
            $patients = Patient::where('national_id', 'LIKE', '%' . $national_id . '%')->paginate(5)->appends(['national_id' => $national_id]);
        } else {
            // No search query, show all users
            $patients = Patient::paginate(5)->fragment('patients');
        }

        return view('doctor.search-student', compact('patients'));
    }

    public function doctorShowPatient($id,Request $request)
    {
        $patient = Patient::find($id);
        $subjects = Subject::all();

        $selected_subject = $request->query('subject');
        $current_time = Carbon::now();
        $upcomingAppointments = $patient->processes()->where('date', '>=', $current_time)->get();

        if ($selected_subject) {
            $completedAppointments = $patient->processes()->where('date', '<', $current_time)->where('subject_id', $selected_subject)->paginate(5)->fragment('completedAppointments');
        } else {
            $completedAppointments = $patient->processes()->where('date', '<', $current_time)->paginate(5)->fragment('completedAppointments');
        }


        foreach ($upcomingAppointments as $appointment) {

            $date_from_database = Carbon::parse($appointment->date);
            $time_difference = $current_time->diffForHumans($date_from_database);
            $student_name = $appointment->student->name;
            $doctor_name = $appointment->doctor->name;
            $patient_name = $appointment->patient->name;
            $assistant_name = $appointment->assistant->name;
            $subject_name = $appointment->subject->name;

            $appointment->time_difference = $time_difference;
            $appointment->student_name = $student_name;
            $appointment->doctor_name = $doctor_name;
            $appointment->patient_name = $patient_name;
            $appointment->assistant_name = $assistant_name;
            $appointment->subject_name = $subject_name;
            $appointment->date = Carbon::parse($appointment->date)->format('Y-m-d');
        }

        foreach ($completedAppointments as $appointment) {

            $date_from_database = Carbon::parse($appointment->date);
            $time_difference = $current_time->diffForHumans($date_from_database);
            $student_name = $appointment->student->name;
            $doctor_name = $appointment->doctor->name;
            $patient_name = $appointment->patient->name;
            $assistant_name = $appointment->assistant->name;
            $subject_name = $appointment->subject->name;

            $appointment->student_name = $student_name;
            $appointment->time_difference = $time_difference;
            $appointment->doctor_name = $doctor_name;
            $appointment->patient_name = $patient_name;
            $appointment->assistant_name = $assistant_name;
            $appointment->subject_name = $subject_name;
            $appointment->date = Carbon::parse($appointment->date)->format('Y-m-d');
        }

        return view('doctor.show-patient', compact('patient', 'upcomingAppointments', 'completedAppointments', 'subjects'));
    }
}
