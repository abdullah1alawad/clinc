@extends('layouts.app')

@section('head')
    @parent
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/adminProfile.js'])
@endsection

@section('content')

    <div class="container emp-profile">
        <div class="row">
            <div class="col-md-3">
                <div class="sidebar">
                    <p>WORK SPACE</p>
                    <a href="{{route('add.admin')}}">Add Admin</a>
                    <a href="{{route('patient.create')}}">Add Patient</a>
                    <a href="{{route('search.patient.page')}}">Search on Patient</a>
                    <a href="{{route('search.student.page')}}">Search on Student</a>
                    <a href="">Canceling a Chair Reservation</a>
                    <a href="{{route('add.subject')}}">Add Subject</a>
                    <a href="{{route('add.clinic')}}">Add Clinic</a>
                    <a href="{{route('add.chair')}}">Add Chair</a>
                </div>
            </div>

            <div class="col-md-9">
                <div class="row">
                    <div class="profile-head col-md-6">
                        <h5>
                            {{$user->name}}
                        </h5>
                        <h6>
                            Make Something Great!
                        </h6>
                    </div>
                    <div class="admin-btn col-md-6 text-end">
                        <a href="{{route('admin.edit.profile')}}" class="profile-edit-btn">Edit Profile</a>
                    </div>
                </div>
                <div class="tabs-sec">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="about-tab" data-toggle="tab" href="#about" role="tab"
                               aria-controls="about" aria-selected="true">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="messages-tab" data-toggle="tab"
                               href="#messages" role="tab"
                               aria-controls="messages" aria-selected="false">
                                Messages
                                @if($user->unreadNotifications->count())
                                    <span class="notify-count">{{$user->unreadNotifications->count()}}</span>
                                @endif
                            </a>
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
                    <div class="tab-pane fade" id="messages" role="tabpanel"
                         aria-labelledby="messages-tab">

                        <div class="col-md-12"
                             style="display: flex; justify-content: end; align-items: center;">


                        </div>


                        <table>
                            <thead class="text-center">
                            <tr>
                                <th>#</th>
                                <th width="65%">Title</th>
                                <th colspan="2" class="text-end">
                                    <form method="GET" action="{{ route('admin.profile') }}">
                                        <input type="hidden" name="unread" value="1">
                                        <button type="submit" id="msg_btn" class="btn btn-outline-dark">Unread Messages
                                            Only
                                        </button>
                                    </form>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($messages as $message)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td class="text-center">{{$message->data['title']}}</td>
                                    <td class="text-end">
                                        @if(!$message->read_at)
                                            Mark As Read
{{--                                            {{$message->markAsRead()}}--}}
                                        @endif
                                    </td>
                                    <td class="text-end">More Details</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <br>
                        <div class="text-center">
                            {!! $messages->links() !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
