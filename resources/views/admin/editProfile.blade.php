@extends('layouts.app')

@section('head')
    @parent
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/adminProfileEdit.js'])
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
                    <div class="card-header">
                        edit profile
                    </div>
                    <div class="card-body">
                        <div class="tabs-sec">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="about-tab" data-toggle="tab" href="#about" role="tab"
                                       aria-controls="about" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="changePassword-tab" data-toggle="tab" href="#changePassword"
                                       role="tab"
                                       aria-controls="changePassword" aria-selected="false">Change Password</a>
                                </li>
                                <li class="col-md-8 text-end admin-btn">
                                    <a href="{{route('admin.profile')}}" class="profile-edit-btn" style="padding: 1%">Profile</a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                                <form action="{{route('admin.update.profile')}}" method="post">
                                    @csrf
                                    <div class="row py-1">
                                        <div class="col-md-6">
                                            <label>Name</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="name" value="{{$user->name}}">

                                            @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="row py-1">
                                        <div class="col-md-6">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="email" name="email" value="{{$user->email}}">
                                            @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row py-1">
                                        <div class="col-md-6">
                                            <label>Phone</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="phone" value="{{$user->phone}}">

                                            @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="row py-1">
                                        <div class="col-md-6">
                                            <label>National_id</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="national_id" value="{{$user->national_id}}">

                                            @error('national_id')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-md-6">
                                            <label>Gender</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="radio-container">
                                                <input type="radio" id="male" name="gender"
                                                       value="0" {{($user->gender == 'Male') ? 'checked' : ''}}>
                                                <label for="male">Male</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="female" name="gender"
                                                       value="1" {{($user->gender == 'Female') ? 'checked' : ''}}>
                                                <label for="female">Female</label>
                                            </div>
                                            @error('gender')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="admin-btn text-center">
                                        <input type="submit" class="profile-edit-btn" name="updateAbout" value="Edit Profile"/>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="changePassword" role="tabpanel"
                                 aria-labelledby="changePassword-tab">
                                <form action="{{route('admin.change.password')}}" method="post">
                                    @csrf
                                    <div class="row py-2">
                                        <div class="col-md-6">
                                            <label>Old Password</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="password" name="oldPassword">
                                            @error('oldPassword')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-md-6">
                                            <label>New Password</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="password" name="newPassword">
                                            @error('newPassword')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-md-6">
                                            <label>Confirm Password</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="password" name="confirmPassword">
                                            @error('confirmPassword')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="admin-btn text-center">
                                        <input type="submit" class="profile-edit-btn" name="changePassword"
                                               value="Edit Password"/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

