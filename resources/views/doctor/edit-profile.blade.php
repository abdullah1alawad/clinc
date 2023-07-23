@extends('layouts.app')

@section('head')
    @parent
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/doctorProfileEdit.js'])
@endsection

@section('content')

    <div class="container emp-profile">
        <div class="row">
            <div class="col-md-4">
                <form action="{{route('doctor.change.photo')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="profile-img">
                        <img src="{{asset('images/' . $user->photo)}}" alt="image error"/>
                        <div class="file btn btn-lg btn-primary">
                            Change Photo
                            <input type="file" name="photo"/>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="col-md-12 text-center">
                            <input type="submit" class="profile-edit-btn" name="changePhoto" value="Save Photo"/>
                        </div>
                    </div>
                </form>
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
        </div>
        <div class="row justify-content-end">
            <div class="col-md-8">
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
                    </ul>
                </div>

                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                        <form action="{{route('doctor.profile.update')}}" method="post">
                            @method('put')
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
{{--                                        <input type="radio" id="male" name="gender" value="0" checked>--}}
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
                            <div class="col-md-7 text-center">
                                <input type="submit" class="profile-edit-btn" name="updateAbout" value="Edit Profile"/>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="changePassword" role="tabpanel"
                         aria-labelledby="changePassword-tab">
                        <form action="{{route('doctor.change.password')}}" method="post">
                            @csrf
                            @method('put')
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
                            <div class="col-md-7 text-center">
                                <input type="submit" class="profile-edit-btn" name="changePassword"
                                       value="Edit Profile"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

