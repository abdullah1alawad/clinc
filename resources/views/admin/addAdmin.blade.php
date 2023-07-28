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

    @if(session('field'))
        <div class="alert alert-danger text-center">
            {{ session('field') }}
        </div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Add admin
                    </div>
                    <div class="card-body">
                        <div class="tabs-sec">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="about-tab" data-toggle="tab" href="#about" role="tab"
                                       aria-controls="about" aria-selected="true">Existing User</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="changePassword-tab" data-toggle="tab" href="#changePassword"
                                       role="tab"
                                       aria-controls="changePassword" aria-selected="false">New User</a>
                                </li>
                                <li class="col-md-8 text-end admin-btn">
                                    <a href="{{route('admin.profile')}}" class="profile-edit-btn" style="padding: 1%">Profile</a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="about" role="tabpanel"
                                 aria-labelledby="about-tab">
                                <form method="POST" action="{{ route('store.existing.admin') }}">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="national_id"
                                               class="col-md-4 col-form-label text-md-end">National Id:</label>

                                        <div class="col-md-6">
                                            <input id="national_idl" type="text"
                                                   class="form-control @error('national_id') is-invalid @enderror"
                                                   name="national_id" value="{{ old('national_id') }}" required
                                                   autofocus>

                                            @error('national_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="text-center">
                                            <button type="submit" class="back-btn" style="margin: 0px">
                                                Add
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="changePassword" role="tabpanel"
                                 aria-labelledby="changePassword-tab">
                                <form action="{{route('store.new.admin')}}" method="post">
                                    @csrf
                                    <div class="row py-1">
                                        <div class="col-md-6">
                                            <label>Name</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="name">

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
                                            <input type="email" name="email">
                                            @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row py-1">
                                        <div class="col-md-6">
                                            <label>Password</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="password" name="password">
                                            @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row py-1">
                                        <div class="col-md-6">
                                            <label>Confirm Password</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="password" name="password_confirmation">
                                            @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row py-1">
                                        <div class="col-md-6">
                                            <label>Phone</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="phone">

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
                                            <input type="text" name="national_id">

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
                                                       value="0" checked>
                                                <label for="male">Male</label>
                                            </div>

                                            <div class="radio-container">
                                                <input type="radio" id="female" name="gender"
                                                       value="1">
                                                <label for="female">Female</label>
                                            </div>
                                            @error('gender')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-0">
                                        <div class="text-center">
                                            <button type="submit" class="back-btn" style="margin: 0px">
                                                Add
                                            </button>
                                        </div>
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

