@extends('layouts.app')

@section('head')
    @parent
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Patient Information</div>

                    <div class="card-body patient-class">
                        <div class="row">
                            <div class="col-md-5">
                                <label>Patient Name:</label> <span>{{$patient->name}}</span>
                            </div>
                            <div class="col-md-3">
                                <label>Gander:</label> <span>{{$patient->gender}}</span>
                            </div>
                            <div class="col-md-4">
                                <label>Birth Date:</label> <span>{{$patient->birth_date}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Height:</label> <span>{{$patient->height}}</span>
                            </div>
                            <div class="col-md-7">
                                <label>Weight:</label> <span>{{$patient->weight}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <label>Address:</label> <span>{{$patient->address}}</span>
                            </div>
                            <div class="col-md-4">
                                <label>Phone Number:</label> <span>{{$patient->phone}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Job:</label> <span>{{$patient->job}}</span>
                            </div>
                            <div class="col-md-7">
                                <label>Form Date:</label> <span>{{$patient->updated_at}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Last Medical Scan Date:</label> <span>{{$patient->last_medical_scan_date}}</span>
                            </div>
                            <div class="col-md-7">
                                <label>Personal Doctor Name:</label> <span>{{$patient->personal_doctor_name}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Are You Currently Under a Doctor's Care:</label> <span>question</span>
                            </div>
                            <div class="col-md-7">
                                <label>What condition are you being treated for:</label> <span>{{$patient->currently_disease}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Have you ever had a skin condition or surgery:</label> <span>Yes</span>
                            </div>
                            <div class="col-md-3">
                                <label>Skin Disease:</label> <span>{{$patient->skin_disease}}</span>
                            </div>
                            <div class="col-md-4">
                                <label>Skin Surgery:</label> <span>{{$patient->skin_surgery}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <label>Have you been hospitalized within the past five years:</label> <span>Yes</span>
                            </div>
                            <div class="col-md-4">
                                <label>Reason:</label> <span>{{$patient->reason_to_go_hospital}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <label>Pneumonia or Pulmonary Heart Disease (rheumatic):</label> <span>Yes</span>
                            </div>
                            <div class="col-md-4">
                                <label>Congenital heart disorders:</label> <span>No</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Cardiovascular Disease:</label> <span>Yes</span>
                            </div>
                            <div class="col-md-7">
                                <label>Do you experience chest pain or pressure during exertion:</label> <span>No</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Do you experience shortness of breath after light exercise:</label> <span>Yes</span>
                            </div>
                            <div class="col-md-7">
                                <label>Do your ankles swell:</label> <span>No</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Do you feel shortness of breath when lying down or require extra pillows while sleeping:</label> <span>Yes</span>
                            </div>
                            <div class="col-md-7">
                                <label>Have you ever been told you have a heart murmur:</label> <span>No</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Asthma or hay fever:</label> <span>Yes</span>
                            </div>
                            <div class="col-md-7">
                                <label>Skin rash or hives:</label> <span>No</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Seizure disorder:</label> <span>Yes</span>
                            </div>
                            <div class="col-md-7">
                                <label>Diabetes:</label> <span>No</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Do you urinate more than 6 times a day:</label> <span>Yes</span>
                            </div>
                            <div class="col-md-7">
                                <label>Do you feel thirsty most of the time:</label> <span>No</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Does your throat become dry:</label> <span>Yes</span>
                            </div>
                            <div class="col-md-7">
                                <label>Hepatitis or liver disease:</label> <span>No</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Arthritis or joint problems:</label> <span>Yes</span>
                            </div>
                            <div class="col-md-7">
                                <label>Gastroesophageal reflux disease (GERD):</label> <span>No</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Kidney problems:</label> <span>Yes</span>
                            </div>
                            <div class="col-md-7">
                                <label>Tuberculosis (TB):</label> <span>No</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Persistent cough or coughing up blood:</label> <span>Yes</span>
                            </div>
                            <div class="col-md-7">
                                <label>Syphilis:</label> <span>No</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Other disease:</label> <span>Yes</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Have you had any abnormal bleeding:</label> <span>Yes</span>
                            </div>
                            <div class="col-md-7">
                                <label>Do you bruise easily:</label> <span>No</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Have you ever required a blood transfusion:</label> <span>Yes</span>
                            </div>
                            <div class="col-md-7">
                                <label>Reason:</label> <span>{{$patient->reason_to_transform_blood}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Have you ever had any blood disorders such as anemia:</label> <span>Yes</span>
                            </div>
                            <div class="col-md-7">
                                <label>Have you ever had radiation therapy for tumors in the head:</label> <span>No</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Antibiotics or sulfa drugs:</label> <span>Yes</span>
                            </div>
                            <div class="col-md-7">
                                <label>Blood thinners or anticoagulants:</label> <span>No</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>High blood pressure medication:</label> <span>Yes</span>
                            </div>
                            <div class="col-md-7">
                                <label>Cortisone, including prednisone:</label> <span>No</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Sedatives:</label> <span>Yes</span>
                            </div>
                            <div class="col-md-7">
                                <label>Aspirin:</label> <span>No</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Insulin:</label> <span>Yes</span>
                            </div>
                            <div class="col-md-7">
                                <label>Digitalis or heart medication:</label> <span>No</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Nitroglycerin:</label> <span>Yes</span>
                            </div>
                            <div class="col-md-7">
                                <label>Oral contraceptives or any other hormonal treatments:</label> <span>No</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Other medicine:</label> <span>Yes</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Do you have any allergies or have you ever had an allergic reaction to:</label> <span>Yes</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label> Local anesthesia (Novocaine, Lidocaine):</label> <span>Yes</span>
                            </div>
                            <div class="col-md-7">
                                <label>Penicillin or antibiotics:</label> <span>No</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Sulfa drugs:</label> <span>Yes</span>
                            </div>
                            <div class="col-md-7">
                                <label>Aspirin:</label> <span>No</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Iodine or X-rays:</label> <span>Yes</span>
                            </div>
                            <div class="col-md-7">
                                <label>Codeine or other sedatives:</label> <span>No</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Have you ever had a skin problem related to previous dental treatment?:</label> <span>{{$patient->skin_tooth_disease}}</span>
                            </div>
                            <div class="col-md-7">
                                <label>Do you work anywhere that exposes you to X-rays or other radiation?:</label> <span>No</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Do you wear contact lenses:</label> <span>Yes</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>For women:</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Are you pregnant or have you missed a menstrual period:</label> <span>no</span>
                            </div>
                            <div class="col-md-7">
                                <label> Are you currently breastfeeding:</label> <span>No</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>What is the main dental complaint for which you are seeking treatment today:</label> <span>{{$patient->reason_to_came}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Patient signature indicating the accuracy and truthfulness of the above information.</label> <span>{{$patient->signature}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

