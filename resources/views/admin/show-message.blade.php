@extends('layouts.app')

@section('head')
    @parent
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/studentProfile.js'])
@endsection

@section('content')


    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Message</div>

                    <div class="card-body">
                        <div class="alert alert-success">
                            [{{$msg->created_at}}
                            ] {{$msg->data['user']}} {{$msg->data['user_name']}}
                            ({{$msg->data['user_email']}}) has just registered
                        </div>
                        <div class="info-class">
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

                        @if($msg->data['user'] == 'Student')
                            <div class="row justify-content-center">
                                <a href="{{route('user.reject',['id'=>$user->id,'type'=>$msg->data['user']])}}" class="btn btn-danger col-md-2" style="margin: 1%;">Ban</a>
                            </div>
                            @else
                            <div class="row justify-content-center">
                                <a href="{{route('user.reject',['id'=>$user->id,'type'=>$msg->data['user']])}}" class="btn btn-danger col-md-2" style="margin: 1%;">Reject</a>
                                <a href="{{route('user.accept',['id'=>$user->id,'type'=>$msg->data['user']])}}" class="btn btn-success col-md-2" style="margin: 1%;">Accept</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

