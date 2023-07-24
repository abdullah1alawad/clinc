@extends('layouts.app')

@section('head')
    @parent
    @vite(['resources/sass/app.scss', 'resources/js/app.js' , 'resources/js/patientInfo.js'])
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Patient Information</div>

                    <div class="card-body patient-class">

                        <section id="section1">
                            <table>
                                <tr>
                                    <th>Patient Name</th>
                                    <td>{{$patient->name}}</td>
                                </tr>
                                <tr>
                                    <th>National Id</th>
                                    <td>{{$patient->national_id}}</td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td>{{$patient->gender}}</td>
                                </tr>
                                <tr>
                                    <th>Birth Date</th>
                                    <td>{{$patient->birth_date}}</td>
                                </tr>
                                <tr>
                                    <th>Height</th>
                                    <td>{{$patient->height}} cm</td>
                                </tr>
                                <tr>
                                    <th>Weight</th>
                                    <td>{{$patient->weight}} kg</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{$patient->address}}</td>
                                </tr>
                                <tr>
                                    <th>Phone Number</th>
                                    <td>{{$patient->phone}}</td>
                                </tr>
                                <tr>
                                    <th>Job</th>
                                    <td>{{$patient->job}}</td>
                                </tr>
                                <tr>
                                    <th>Form Date</th>
                                    <td>{{$patient->updated_at}}</td>
                                </tr>
                            </table>
                        </section>

                        <section id="section2">
                            <table>
                                <tr>
                                    <th class="col-md-8">Last Medical Scan Date</th>
                                    <td>{{$patient->last_medical_scan_date}}</td>
                                </tr>
                                <tr>
                                    <th>Personal Doctor Name</th>
                                    <td>{{$patient->personal_doctor_name}}</td>
                                </tr>
                                <tr>
                                    <th>Are You Currently Under a Doctor's Care</th>
                                    <td>{{$patient->questions[1]}}</td>
                                </tr>
                                <tr>
                                    <th>What condition are you being treated for</th>
                                    <td>{{$patient->currently_disease}}</td>
                                </tr>
                                <tr>
                                    <th>Have you ever had a skin condition or surgery</th>
                                    <td>{{$patient->questions[2]}}</td>
                                </tr>
                                <tr>
                                    <th>Skin Disease</th>
                                    <td>{{$patient->skin_disease}}</td>
                                </tr>
                                <tr>
                                    <th>Skin Surgery</th>
                                    <td>{{$patient->skin_surgery}}</td>
                                </tr>
                                <tr>
                                    <th>Have you been hospitalized within the past five years</th>
                                    <td>{{$patient->questions[3]}}</td>
                                </tr>
                                <tr>
                                    <th>Reason</th>
                                    <td>{{$patient->reason_to_go_hospital}}</td>
                                </tr>
                            </table>
                        </section>

                        <section id="section3">
                            <p>Do you have or have you had any of the following diseases or conditions?</p>
                            <table>
                                <tr>
                                    <th class="col-md-10">Pneumonia or Pulmonary Heart Disease (rheumatic)</th>
                                    <td>{{$patient->questions[4]}}</td>
                                </tr>
                                <tr>
                                    <th>Congenital heart disorders</th>
                                    <td>{{$patient->questions[5]}}</td>
                                </tr>
                                <tr>
                                    <th>Cardiovascular Disease</th>
                                    <td>{{$patient->questions[6]}}</td>
                                </tr>
                                <tr>
                                    <th>Do you experience chest pain or pressure during exertion</th>
                                    <td>{{$patient->questions[7]}}</td>
                                </tr>
                                <tr>
                                    <th>Do you experience shortness of breath after light exercise</th>
                                    <td>{{$patient->questions[8]}}</td>
                                </tr>
                                <tr>
                                    <th>Do your ankles swell</th>
                                    <td>{{$patient->questions[9]}}</td>
                                </tr>
                                <tr>
                                    <th>Do you feel shortness of breath when lying down or require extra pillows while
                                        sleeping
                                    </th>
                                    <td>{{$patient->questions[10]}}</td>
                                </tr>
                                <tr>
                                    <th>Have you ever been told you have a heart murmur</th>
                                    <td>{{$patient->questions[11]}}</td>
                                </tr>
                                <tr>
                                    <th>Asthma or hay fever</th>
                                    <td>{{$patient->questions[12]}}</td>
                                </tr>
                                <tr>
                                    <th>Skin rash or hives</th>
                                    <td>{{$patient->questions[13]}}</td>
                                </tr>
                                <tr>
                                    <th>Seizure disorder</th>
                                    <td>{{$patient->questions[14]}}</td>
                                </tr>
                                <tr>
                                    <th>Diabetes</th>
                                    <td>{{$patient->questions[15]}}</td>
                                </tr>
                                <tr>
                                    <th>Do you urinate more than 6 times a day</th>
                                    <td>{{$patient->questions[16]}}</td>
                                </tr>
                                <tr>
                                    <th>Do you feel thirsty most of the time</th>
                                    <td>{{$patient->questions[17]}}</td>
                                </tr>
                                <tr>
                                    <th>Does your throat become dry</th>
                                    <td>{{$patient->questions[18]}}</td>
                                </tr>
                                <tr>
                                    <th>Hepatitis or liver disease</th>
                                    <td>{{$patient->questions[19]}}</td>
                                </tr>
                                <tr>
                                    <th>Arthritis or joint problems</th>
                                    <td>{{$patient->questions[20]}}</td>
                                </tr>
                                <tr>
                                    <th>Gastroesophageal reflux disease (GERD)</th>
                                    <td>{{$patient->questions[21]}}</td>
                                </tr>
                                <tr>
                                    <th>Kidney problems</th>
                                    <td>{{$patient->questions[22]}}</td>
                                </tr>
                                <tr>
                                    <th>Tuberculosis (TB)</th>
                                    <td>{{$patient->questions[23]}}</td>
                                </tr>
                                <tr>
                                    <th>Persistent cough or coughing up blood</th>
                                    <td>{{$patient->questions[24]}}</td>
                                </tr>
                                <tr>
                                    <th>Syphilis</th>
                                    <td>{{$patient->questions[25]}}</td>
                                </tr>
                                <tr>
                                    <th>Other disease</th>
                                    <td><a href="{{route('patient.diseases',$patient->id)}}">Show</a></td>
                                </tr>
                            </table>
                        </section>

                        <section id="section4">
                            <table>
                                <tr>
                                    <th class="col-md-10">Have you had any abnormal bleeding</th>
                                    <td>{{$patient->questions[26]}}</td>
                                </tr>
                                <tr>
                                    <th>Do you bruise easily</th>
                                    <td>{{$patient->questions[27]}}</td>
                                </tr>
                                <tr>
                                    <th>Have you ever required a blood transfusion</th>
                                    <td>{{$patient->questions[28]}}</td>
                                </tr>
                                <tr>
                                    <th>Reason</th>
                                    <td>{{$patient->reason_to_transform_blood}}</td>
                                </tr>
                                <tr>
                                    <th>Have you ever had any blood disorders such as anemia</th>
                                    <td>{{$patient->questions[29]}}</td>
                                </tr>
                                <tr>
                                    <th>Have you ever had radiation therapy for tumors in the head</th>
                                    <td>{{$patient->questions[30]}}</td>
                                </tr>
                            </table>
                        </section>

                        <section id="section5">
                            <p>Do you take any of the following?</p>
                            <table>
                                <tr>
                                    <th class="col-md-10">Antibiotics or sulfa drugs</th>
                                    <td>{{$patient->questions[31]}}</td>
                                </tr>
                                <tr>
                                    <th>Blood thinners or anticoagulants</th>
                                    <td>{{$patient->questions[32]}}</td>
                                </tr>
                                <tr>
                                    <th>High blood pressure medication</th>
                                    <td>{{$patient->questions[33]}}</td>
                                </tr>
                                <tr>
                                    <th>Cortisone, including prednisone</th>
                                    <td>{{$patient->questions[34]}}</td>
                                </tr>
                                <tr>
                                    <th>Sedatives</th>
                                    <td>{{$patient->questions[35]}}</td>
                                </tr>
                                <tr>
                                    <th>Aspirin</th>
                                    <td>{{$patient->questions[36]}}</td>
                                </tr>
                                <tr>
                                    <th>Insulin</th>
                                    <td>{{$patient->questions[37]}}</td>
                                </tr>
                                <tr>
                                    <th>Digitalis or heart medication</th>
                                    <td>{{$patient->questions[38]}}</td>
                                </tr>
                                <tr>
                                    <th>Nitroglycerin</th>
                                    <td>{{$patient->questions[39]}}</td>
                                </tr>
                                <tr>
                                    <th>Oral contraceptives or any other hormonal treatments</th>
                                    <td>{{$patient->questions[40]}}</td>
                                </tr>
                                <tr>
                                    <th>Other medicine</th>
                                    <td><a href="{{route('patient.medicines',$patient->id)}}">Show</a></td>
                                </tr>
                            </table>
                        </section>

                        <section id="section6">
                            <p>Do you have any allergies or have you ever had an allergic reaction to:</p>
                            <table>
                                <tr>
                                    <th class="col-md-10">Local anesthesia (Novocaine, Lidocaine)</th>
                                    <td>{{$patient->questions[41]}}</td>
                                </tr>
                                <tr>
                                    <th>Penicillin or antibiotics</th>
                                    <td>{{$patient->questions[42]}}</td>
                                </tr>
                                <tr>
                                    <th>Penicillin or antibiotics</th>
                                    <td>{{$patient->questions[43]}}</td>
                                </tr>
                                <tr>
                                    <th>Aspirin</th>
                                    <td>{{$patient->questions[44]}}</td>
                                </tr>
                                <tr>
                                    <th>Iodine or X-rays</th>
                                    <td>{{$patient->questions[45]}}</td>
                                </tr>
                                <tr>
                                    <th>Codeine or other sedatives</th>
                                    <td>{{$patient->questions[46]}}</td>
                                </tr>
                            </table>
                        </section>

                        <section id="section7">
                            <table>
                                <tr>
                                    <th>Have you ever had a skin problem related to previous dental treatment</th>
                                    <td>{{$patient->skin_tooth_disease}}</td>
                                </tr>
                                <tr>
                                    <th>Do you work anywhere that exposes you to X-rays or other radiation</th>
                                    <td>{{$patient->questions[47]}}</td>
                                </tr>
                                <tr>
                                    <th>Do you wear contact lenses</th>
                                    <td>{{$patient->questions[48]}}</td>
                                </tr>
                            </table>
                        </section>

                        @if($patient->gender == 'female')
                            <section id="section8">
                                <p>For women:</p>
                                <table>
                                    <tr>
                                        <th>Are you pregnant or have you missed a menstrual period</th>
                                        <td>{{$patient->questions[49]}}</td>
                                    </tr>
                                    <tr>
                                        <th>Are you currently breastfeeding</th>
                                        <td>{{$patient->questions[50]}}</td>
                                    </tr>
                                </table>
                            </section>
                        @endif

                        <section id="section9">
                            <table>
                                <tr>
                                    <th>What is the main dental complaint for which you are seeking treatment today</th>
                                    <td>{{$patient->reason_to_came}}</td>
                                </tr>
                            </table>
                            <br>

                            <p>Patient signature indicating the accuracy and truthfulness of the above
                                information :</p>

                            <div class="col-md-12 text-center">
                                <img src="{{asset('images/' . $patient->signature )}}">
                            </div>
                        </section>

                        <nav>
                            <ul>
                                <li><a href="#section1">1</a></li>
                                <li><a href="#section2">2</a></li>
                                <li><a href="#section3">3</a></li>
                                <li><a href="#section4">4</a></li>
                                <li><a href="#section5">5</a></li>
                                <li><a href="#section6">6</a></li>
                                <li><a href="#section7">7</a></li>
                                @if($patient->gender == 'female')
                                <li><a href="#section8">8</a></li>
                                @endif
                                <li><a href="#section9">{{($patient->gender == 'female' ? 9 : 8)}}</a></li>
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

