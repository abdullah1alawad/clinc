@extends('layouts.app')

@section('content')

    <div class="container emp-profile">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img
                        src="{{asset('images/' . $user->photo)}}"
                        alt="image error"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>
                        {{$user->name}}
                    </h5>
                    <h6>
                        The Best Dentist In The World
                    </h6>
                </div>
            </div>
            <div class="col-md-2">
                <a href="{{route('student.edit.profile')}}" class="profile-edit-btn">Edit Profile</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-work">
                    <p>WORK SPACE</p>
                    <a href="">Add Patient</a><br/>
                    <a href="">Search on Patient</a><br/>
                    <a href="">Booking an Chair</a><br/>
                    <a href="">Canceling a Chair Reservation</a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="tabs-sec">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="about-tab" data-toggle="tab" href="#about" role="tab"
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
                               aria-controls="completedAppointments" aria-selected="false">Your Completed
                                Appointments</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$user->name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$user->email}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Phone</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$user->phone}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>National Id</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$user->national_id}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Gender</label>
                            </div>
                            <div class="col-md-6">
                                @if($user->gender=='Male')
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
                        <h6>press any row to show sub-mark</h6>
                        <table>
                            <thead>
                            <tr>
                                <th>Doctor Name</th>
                                <th>Patient Name</th>
                                <th>Assistant Name</th>
                                <th>Subject Name</th>
                                <th>Chair Number</th>
                                <th>Completion Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($completedAppointments as $appointment)
                                <tr class="clickable-row"
                                    data-href="{{route('student.showSubprocessMark',$appointment->id)}}">
                                    <td>{{$appointment->doctor_name}}</td>
                                    <td>{{$appointment->patient_name}}</td>
                                    <td>{{$appointment->assistant_name}}</td>
                                    <td>{{$appointment->subject_name}}</td>
                                    <td>{{$appointment->chair_id}}</td>
                                    <td>{{$appointment->date}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            {!! $completedAppointments->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

