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
                    <div class="card-header">Add Patient</div>

                    <form action="{{route('patient.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body patient-class">

                            <section id="section1">
                                <p>Basic information:</p>
                                <table>
                                    <tr>
                                        <th>Patient Name</th>
                                        <td>
                                            <input type="text" name="name">

                                            @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>National Id</th>
                                        <td>
                                            <input type="text" name="national_id">

                                            @error('national_id')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Gender</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="male" name="gender" value="0" checked>
                                                <label for="male">Male</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="female" name="gender" value="1">
                                                <label for="female">Female</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Birth Date</th>
                                        <td>
                                            <input type="date" name="birth_date">

                                            @error('birth_date')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Height</th>
                                        <td>
                                            <input type="text" name="height">

                                            @error('height')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Weight</th>
                                        <td>
                                            <input type="text" name="weight">

                                            @error('weight')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>
                                            <input type="text" name="address">

                                            @error('address')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Phone Number</th>
                                        <td>
                                            <input type="text" name="phone">

                                            @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Job</th>
                                        <td>
                                            <input type="text" name="job">

                                            @error('job')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                </table>
                            </section>

                            <section id="section2">
                                <table>
                                    <tr>
                                        <th class="col-md-8">Last Medical Scan Date</th>
                                        <td>
                                            <input type="date" name="last_medical_scan_date">

                                            @error('last_medical_scan_date')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Personal Doctor Name</th>
                                        <td>
                                            <input type="text" name="personal_doctor_name">

                                            @error('personal_doctor_name')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Are You Currently Under a Doctor's Care</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[1]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[1]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>What condition are you being treated for</th>
                                        <td>
                                            <input type="text" name="currently_disease">

                                            @error('currently_disease')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Have you ever had a skin condition or surgery</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[2]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[2]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Skin Disease</th>
                                        <td>
                                            <input type="text" name="skin_disease">

                                            @error('skin_disease')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Skin Surgery</th>
                                        <td>
                                            <input type="text" name="skin_surgery">

                                            @error('skin_surgery')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Have you been hospitalized within the past five years</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[3]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[3]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Reason</th>
                                        <td>
                                            <input type="text" name="reason_to_go_hospital">

                                            @error('reason_to_go_hospital')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                </table>
                            </section>

                            <section id="section3">
                                <p>Do you have or have you had any of the following diseases or conditions?</p>
                                <table>
                                    <tr>
                                        <th class="col-md-9">Pneumonia or Pulmonary Heart Disease (rheumatic)</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[4]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[4]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Congenital heart disorders</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[5]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[5]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Cardiovascular Disease</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[6]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[6]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Do you experience chest pain or pressure during exertion</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[7]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[7]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Do you experience shortness of breath after light exercise</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[8]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[8]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Do your ankles swell</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[9]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[9]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Do you feel shortness of breath when lying down or require extra pillows
                                            while
                                            sleeping
                                        </th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[10]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[10]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Have you ever been told you have a heart murmur</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[11]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[11]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Asthma or hay fever</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[12]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[12]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Skin rash or hives</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[13]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[13]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Seizure disorder</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[14]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[14]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Diabetes</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[15]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[15]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Do you urinate more than 6 times a day</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[16]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[16]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Do you feel thirsty most of the time</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[17]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[17]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Does your throat become dry</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[18]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[18]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Hepatitis or liver disease</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[19]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[19]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Arthritis or joint problems</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[20]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[20]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Gastroesophageal reflux disease (GERD)</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[21]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[21]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Kidney problems</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[22]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[22]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tuberculosis (TB)</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[23]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[23]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Persistent cough or coughing up blood</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[24]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[24]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Syphilis</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[25]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[25]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Other disease</th>
                                        <td>
                                            <div class="new-disease">
                                                {{--the new disease will appended here--}}
                                            </div>

                                            <input type="text" name="new_disease" placeholder="Add other disease"
                                                   style="margin-bottom: 5px">
                                            <button type="button" onclick="addDisease()">Add</button>
                                        </td>
                                    </tr>
                                </table>
                            </section>

                            <section id="section4">
                                <table>
                                    <tr>
                                        <th class="col-md-10">Have you had any abnormal bleeding</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[26]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[26]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Do you bruise easily</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[27]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[27]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Have you ever required a blood transfusion</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[28]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[28]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Reason</th>
                                        <td>
                                            <input type="text" name="reason_to_transform_blood">

                                            @error('reason_to_transform_blood')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Have you ever had any blood disorders such as anemia</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[29]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[29]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Have you ever had radiation therapy for tumors in the head</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[30]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[30]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </section>

                            <section id="section5">
                                <p>Do you take any of the following?</p>
                                <table>
                                    <tr>
                                        <th class="col-md-9">Antibiotics or sulfa drugs</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[31]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[31]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Blood thinners or anticoagulants</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[32]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[32]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>High blood pressure medication</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[33]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[33]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Cortisone, including prednisone</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[34]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[34]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Sedatives</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[35]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[35]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Aspirin</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[36]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[36]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Insulin</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[37]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[37]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Digitalis or heart medication</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[38]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[38]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Nitroglycerin</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[39]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[39]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Oral contraceptives or any other hormonal treatments</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[40]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[40]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Other medicine</th>
                                        <td>
                                            <div class="new-medicine">
                                                {{--the new medicine will appended here--}}
                                            </div>

                                            <input type="text" name="new_medicine" placeholder="Add other medicine"
                                                   style="margin-bottom: 5px">
                                            <button type="button" onclick="addMedicine()">Add</button>
                                        </td>
                                    </tr>
                                </table>
                            </section>

                            <section id="section6">
                                <p>Do you have any allergies or have you ever had an allergic reaction to:</p>
                                <table>
                                    <tr>
                                        <th class="col-md-9">Local anesthesia (Novocaine, Lidocaine)</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[41]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[41]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Penicillin or antibiotics</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[42]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[42]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Penicillin or antibiotics</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[43]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[43]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Aspirin</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[44]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[44]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Iodine or X-rays</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[45]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[45]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Codeine or other sedatives</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[46]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[46]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </section>

                            <section id="section7">
                                <table>
                                    <tr>
                                        <th>Have you ever had a skin problem related to previous dental treatment</th>
                                        <td>
                                            <input type="text" name="skin_tooth_disease">

                                            @error('skin_tooth_disease')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Do you work anywhere that exposes you to X-rays or other radiation</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[47]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[47]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Do you wear contact lenses</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[48]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[48]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </section>


                            <section id="section8">
                                <p>For women:</p>
                                <table>
                                    <tr>
                                        <th>Are you pregnant or have you missed a menstrual period</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[49]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[49]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Are you currently breastfeeding</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes" name="questions[50]" value="1">
                                                <label for="yes">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no" name="questions[50]" value="0" checked>
                                                <label for="no">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </section>

                            <section id="section9">
                                <table>
                                    <tr>
                                        <th>What is the main dental complaint for which you are seeking treatment
                                            today
                                        </th>
                                        <td>
                                            <input type="text" name="reason_to_came">

                                            @error('reason_to_came')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                </table>
                                <br>

                                <p>Patient signature indicating the accuracy and truthfulness of the above
                                    information :</p>

                                <div class="col-md-12 text-center" style="margin-bottom: 5%">
                                    <input type="file" name="signature">

                                    @error('signature')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 text-center">
                                    <input type="submit" class="profile-edit-btn" name="changePassword"
                                           value="Add Patient"/>
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
                                    <li><a href="#section8">8</a></li>
                                    <li><a href="#section9">9</a></li>
                                </ul>
                            </nav>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function addDisease() {
            let input = document.getElementsByName('new_disease')[0];
            let div = document.getElementsByClassName('new-disease')[0];
            let newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.name = 'other_diseases[]';
            newInput.value = input.value;
            newInput.style = "margin-bottom: 5px";
            div.appendChild(newInput);
            input.value = '';
        }

        function addMedicine() {
            let input = document.getElementsByName('new_medicine')[0];
            let div = document.getElementsByClassName('new-medicine')[0];
            let newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.name = 'other_medicines[]';
            newInput.value = input.value;
            newInput.style = "margin-bottom: 5px";
            div.appendChild(newInput);
            input.value = '';
        }
    </script>

@endsection

