@extends('layouts.app')

@section('head')
    @parent
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/doctorProfile.js','resources/js/set-sub-marks.js'])
@endsection

@section('content')

    <div class="container emp-profile">

        <div class="row">
            <div class="col-md-4">

{{--                <div class="profile-img">--}}
{{--                    <img--}}
{{--                        src="{{asset('images/' . $user->photo)}}"--}}
{{--                        alt="image error"/>--}}
{{--                </div>--}}
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>
                        {{$patient->name}}
                    </h5>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-work">
                    <h2 style="color: #0d6efd">links section</h2>
                    <a href="{{route('patient.information',$patient->id)}}" class="btn-outline-light">see more details</a><br/>
                    <a href="{{route('search.patient.page')}}" class="btn-outline-light">back to search page</a><br/>
                    @if(auth()->user()->roles()->where('name','student')->first())
                        <a href="{{ route('student.profile') }}"
                           class="btn-outline-light">back to profile</a>
                    @elseif(auth()->user()->roles()->where('name','doctor')->first())
                        <a href="{{ route('doctor.profile') }}"
                           class="btn-outline-light">back to profile</a>
                    @else
                        <a href="{{ route('admin.profile') }}"
                           class="btn-outline-light">back to profile</a>
                    @endif
                    <br>
{{--                    <a href="{{route('doctor.profile')}}" class="btn-outline-light">back to profile</a><br/>--}}
                </div>
            </div>

            <div class="col-md-8">
                <div class="tabs-sec">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="about-tab" data-toggle="tab" href="#about" role="tab"
                               aria-controls="about" aria-selected="true">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="upcomingAppointments-tab" data-toggle="tab"
                               href="#upcomingAppointments" role="tab"
                               aria-controls="upcomingAppointments" aria-selected="false">Your Upcoming Appointments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="completedAppointments-tab" data-toggle="tab"
                               href="#completedAppointments" role="tab"
                               aria-controls="completedAppointments" aria-selected="false">Your Completed Appointments</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$patient->name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Phone</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$patient->phone}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>National Id</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$patient->national_id}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Gender</label>
                            </div>
                            <div class="col-md-6">
                                @if($patient->gender=='Male')
                                    <div class="radio-container">
                                        <input type="radio" id="male" name="gender" value="0" checked>
                                        <label for="male">Male</label>
                                    </div>
                                @else
                                    <div class="radio-container">
                                        <input type="radio" id="female" name="gender" value="1" checked>
                                        <label for="female">Female</label>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="upcomingAppointments" role="tabpanel"
                         aria-labelledby="upcomingAppointments-tab">
                        <table>
                            <thead>
                            <tr>
                                <th>Doctor Name</th>
                                <th>Student Name</th>
                                <th>Patient Name</th>
                                <th>Assistant Name</th>
                                <th>Subject Name</th>
                                <th>Chair Number</th>
                                <th>Remaining Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($upcomingAppointments as $appointment)
                                <tr>
                                    <td>{{$appointment->doctor_name}}</td>
                                    <td>{{$appointment->student_name}}</td>
                                    <td>{{$appointment->patient_name}}</td>
                                    <td>{{$appointment->assistant_name}}</td>
                                    <td>{{$appointment->subject_name}}</td>
                                    <td>{{$appointment->chair_id}}</td>
                                    <td>{{$appointment->time_difference}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="completedAppointments" role="tabpanel"
                         aria-labelledby="completedAppointments-tab">

                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <h6>Press any row to show sub-mark</h6>

                            <form method="GET" action="{{ route('show.patient',$patient->id) }}">
                                <label for="subject" style="margin-right: 5px">Filter by subject:</label>
                                <select name="subject" id="subject">
                                    <option value="">All subjects</option>
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}"
                                            {{ request()->input('subject') == $subject->id ? 'selected' : '' }}>
                                            {{ $subject->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary" style="margin-left: 5px">Filter</button>
                            </form>
                        </div>

                        <table>
                            <thead>
                            <tr>
                                <th>Doctor Name</th>
                                <th>Student Name</th>
                                <th>Patient Name</th>
                                <th>Assistant Name</th>
                                <th>Subject Name</th>
                                <th>Chair Number</th>
                                <th>Completion Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($completedAppointments as $appointment)
                                <tr>
                                    <td>{{$appointment->doctor_name}}</td>
                                    <td>{{$appointment->student_name}}</td>
                                    <td>{{$appointment->patient_name}}</td>
                                    <td>{{$appointment->assistant_name}}</td>
                                    <td>{{$appointment->subject_name}}</td>
                                    <td>{{$appointment->chair_id}}</td>
                                    <td>{{$appointment->date}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <br>
                        <div class="text-center">
                            {!!$completedAppointments->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
