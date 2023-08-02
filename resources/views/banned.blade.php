@extends('layouts.app')

@section('head')
    @parent
    @vite(['resources/sass/app.scss', 'resources/js/app.js',])
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        <h4 class="alert-danger text-center">your account has been banned</h4>

                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="about" role="tabpanel"
                                 aria-labelledby="about-tab">
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
