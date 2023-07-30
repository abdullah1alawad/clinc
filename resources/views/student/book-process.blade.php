@extends('layouts.app')

@section('head')
    @parent
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Booking Appointment</div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="patient_id" class="col-md-2">{{ __('Patient Name:') }}</label>
                                <div class="col-md-4">
                                    <input type="hidden" value="{{$patient->id}}" name="patient_id">
                                    <input id="patient_id" type="text"
                                           class="form-control @error('patient_id') is-invalid @enderror"
                                           value="{{$patient->name}}" required autocomplete="patient_name" autofocus>
                                    @error('patient_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="doctor_id" class="col-md-2">{{ __('Doctor Name:') }}</label>
                                <div class="col-md-4">
                                    <select class="form-control @error('doctor_id') is-invalid @enderror"
                                            name="doctor_id" id="doctor_id">
                                        @foreach($doctors as $doctor)
                                            <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('doctor_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="subject_id" class="col-md-2">{{ __('Subject Name:') }}</label>
                                <div class="col-md-4">
                                    <select class="form-control @error('subject_id') is-invalid @enderror"
                                            name="subject_id" id="subject_id">
                                        @foreach($subjects as $subject)
                                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('subject_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="photo" class="col-md-2 ">{{ __('Photo:') }}</label>

                                <div class="col-md-6">
                                    <input id="photo" type="file"
                                           class="form-control @error('photo') is-invalid @enderror" name="photo"
                                           value="{{ old('photo') }}" autocomplete="photo" autofocus>
                                    @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

