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

                    <form action="{{route('patient.store')}}" method="POST" enctype="multipart/form-data">
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
                                                <input type="radio" id="yes1" name="questions[1]" value="1">
                                                <label for="yes1">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no1" name="questions[1]" value="0" checked>
                                                <label for="no1">No</label>
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
                                                <input type="radio" id="yes2" name="questions[2]" value="1">
                                                <label for="yes2">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no2" name="questions[2]" value="0" checked>
                                                <label for="no2">No</label>
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
                                                <input type="radio" id="yes3" name="questions[3]" value="1">
                                                <label for="yes3">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no3" name="questions[3]" value="0" checked>
                                                <label for="no3">No</label>
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
                                                <input type="radio" id="yes4" name="questions[4]" value="1">
                                                <label for="yes4">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no4" name="questions[4]" value="0" checked>
                                                <label for="no4">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Congenital heart disorders</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes5" name="questions[5]" value="1">
                                                <label for="yes5">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no5" name="questions[5]" value="0" checked>
                                                <label for="no5">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Cardiovascular Disease</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes6" name="questions[6]" value="1">
                                                <label for="yes6">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no6" name="questions[6]" value="0" checked>
                                                <label for="no6">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Do you experience chest pain or pressure during exertion</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes7" name="questions[7]" value="1">
                                                <label for="yes7">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no7" name="questions[7]" value="0" checked>
                                                <label for="no7">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Do you experience shortness of breath after light exercise</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes8" name="questions[8]" value="1">
                                                <label for="yes8">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no8" name="questions[8]" value="0" checked>
                                                <label for="no8">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Do your ankles swell</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes9" name="questions[9]" value="1">
                                                <label for="yes9">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no9" name="questions[9]" value="0" checked>
                                                <label for="no9">No</label>
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
                                                <input type="radio" id="yes10" name="questions[10]" value="1">
                                                <label for="yes10">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no10" name="questions[10]" value="0" checked>
                                                <label for="no10">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Have you ever been told you have a heart murmur</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes11" name="questions[11]" value="1">
                                                <label for="yes11">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no11" name="questions[11]" value="0" checked>
                                                <label for="no11">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Asthma or hay fever</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes12" name="questions[12]" value="1">
                                                <label for="yes12">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no12" name="questions[12]" value="0" checked>
                                                <label for="no12">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Skin rash or hives</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes13" name="questions[13]" value="1">
                                                <label for="yes13">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no13" name="questions[13]" value="0" checked>
                                                <label for="no13">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Seizure disorder</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes14" name="questions[14]" value="1">
                                                <label for="yes14">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no14" name="questions[14]" value="0" checked>
                                                <label for="no14">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Diabetes</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes15" name="questions[15]" value="1">
                                                <label for="yes15">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no15" name="questions[15]" value="0" checked>
                                                <label for="no15">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Do you urinate more than 6 times a day</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes16" name="questions[16]" value="1">
                                                <label for="yes16">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no16" name="questions[16]" value="0" checked>
                                                <label for="no16">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Do you feel thirsty most of the time</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes17" name="questions[17]" value="1">
                                                <label for="yes17">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no17" name="questions[17]" value="0" checked>
                                                <label for="no17">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Does your throat become dry</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes18" name="questions[18]" value="1">
                                                <label for="yes18">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no18" name="questions[18]" value="0" checked>
                                                <label for="no18">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Hepatitis or liver disease</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes19" name="questions[19]" value="1">
                                                <label for="yes19">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no19" name="questions[19]" value="0" checked>
                                                <label for="no19">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Arthritis or joint problems</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes20" name="questions[20]" value="1">
                                                <label for="yes20">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no20" name="questions[20]" value="0" checked>
                                                <label for="no20">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Gastroesophageal reflux disease (GERD)</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes21" name="questions[21]" value="1">
                                                <label for="yes21">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no21" name="questions[21]" value="0" checked>
                                                <label for="no21">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Kidney problems</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes22" name="questions[22]" value="1">
                                                <label for="yes22">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no22" name="questions[22]" value="0" checked>
                                                <label for="no22">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tuberculosis (TB)</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes23" name="questions[23]" value="1">
                                                <label for="yes23">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no23" name="questions[23]" value="0" checked>
                                                <label for="no23">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Persistent cough or coughing up blood</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes24" name="questions[24]" value="1">
                                                <label for="yes24">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no24" name="questions[24]" value="0" checked>
                                                <label for="no24">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Syphilis</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes25" name="questions[25]" value="1">
                                                <label for="yes25">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no25" name="questions[25]" value="0" checked>
                                                <label for="no25">No</label>
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
                                                <input type="radio" id="yes26" name="questions[26]" value="1">
                                                <label for="yes26">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no26" name="questions[26]" value="0" checked>
                                                <label for="no26">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Do you bruise easily</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes27" name="questions[27]" value="1">
                                                <label for="yes27">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no27" name="questions[27]" value="0" checked>
                                                <label for="no27">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Have you ever required a blood transfusion</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes28" name="questions[28]" value="1">
                                                <label for="yes28">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no28" name="questions[28]" value="0" checked>
                                                <label for="no28">No</label>
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
                                                <input type="radio" id="yes29" name="questions[29]" value="1">
                                                <label for="yes29">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no29" name="questions[29]" value="0" checked>
                                                <label for="no29">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Have you ever had radiation therapy for tumors in the head</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes30" name="questions[30]" value="1">
                                                <label for="yes30">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no30" name="questions[30]" value="0" checked>
                                                <label for="no30">No</label>
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
                                                <input type="radio" id="yes31" name="questions[31]" value="1">
                                                <label for="yes31">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no31" name="questions[31]" value="0" checked>
                                                <label for="no31">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Blood thinners or anticoagulants</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes32" name="questions[32]" value="1">
                                                <label for="yes32">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no32" name="questions[32]" value="0" checked>
                                                <label for="no32">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>High blood pressure medication</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes33" name="questions[33]" value="1">
                                                <label for="yes33">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no33" name="questions[33]" value="0" checked>
                                                <label for="no33">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Cortisone, including prednisone</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes34" name="questions[34]" value="1">
                                                <label for="yes34">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no34" name="questions[34]" value="0" checked>
                                                <label for="no34">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Sedatives</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes35" name="questions[35]" value="1">
                                                <label for="yes35">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no35" name="questions[35]" value="0" checked>
                                                <label for="no35">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Aspirin</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes36" name="questions[36]" value="1">
                                                <label for="yes36">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no36" name="questions[36]" value="0" checked>
                                                <label for="no36">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Insulin</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes37" name="questions[37]" value="1">
                                                <label for="yes37">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no37" name="questions[37]" value="0" checked>
                                                <label for="no37">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Digitalis or heart medication</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes38" name="questions[38]" value="1">
                                                <label for="yes38">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no38" name="questions[38]" value="0" checked>
                                                <label for="no38">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Nitroglycerin</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes39" name="questions[39]" value="1">
                                                <label for="yes39">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no39" name="questions[39]" value="0" checked>
                                                <label for="no39">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Oral contraceptives or any other hormonal treatments</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes40" name="questions[40]" value="1">
                                                <label for="yes40">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no40" name="questions[40]" value="0" checked>
                                                <label for="no40">No</label>
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
                                                <input type="radio" id="yes41" name="questions[41]" value="1">
                                                <label for="yes41">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no41" name="questions[41]" value="0" checked>
                                                <label for="no41">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Penicillin or antibiotics</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes42" name="questions[42]" value="1">
                                                <label for="yes42">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no42" name="questions[42]" value="0" checked>
                                                <label for="no42">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Penicillin or antibiotics</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes43" name="questions[43]" value="1">
                                                <label for="yes43">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no43" name="questions[43]" value="0" checked>
                                                <label for="no43">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Aspirin</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes44" name="questions[44]" value="1">
                                                <label for="yes44">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no44" name="questions[44]" value="0" checked>
                                                <label for="no44">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Iodine or X-rays</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes45" name="questions[45]" value="1">
                                                <label for="yes45">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no45" name="questions[45]" value="0" checked>
                                                <label for="no45">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Codeine or other sedatives</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes46" name="questions[46]" value="1">
                                                <label for="yes46">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no46" name="questions[46]" value="0" checked>
                                                <label for="no46">No</label>
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
                                                <input type="radio" id="yes47" name="questions[47]" value="1">
                                                <label for="yes47">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no47" name="questions[47]" value="0" checked>
                                                <label for="no47">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Do you wear contact lenses</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes48" name="questions[48]" value="1">
                                                <label for="yes48">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no48" name="questions[48]" value="0" checked>
                                                <label for="no48">No</label>
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
                                                <input type="radio" id="yes49" name="questions[49]" value="1">
                                                <label for="yes49">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no49" name="questions[49]" value="0" checked>
                                                <label for="no49">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Are you currently breastfeeding</th>
                                        <td>
                                            <div class="radio-container">
                                                <input type="radio" id="yes50" name="questions[50]" value="1">
                                                <label for="yes50">Yes</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="no50" name="questions[50]" value="0" checked>
                                                <label for="no50">No</label>
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
                                    <li><a href="#section1" class="active">1</a></li>
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
                    <div class="col-md-12 text-center">
                        <a href="{{ \Illuminate\Support\Facades\URL::previous() }}"
                           class="back-btn">Back</a>
                    </div>
                    <br>
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

