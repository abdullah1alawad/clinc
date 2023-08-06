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
                            [{{$message->created_at}}]
                            Doctor {{$message->data['doctor_name']}} accepted
                            Student ({{$message->data['student_name']}}) chair booking request for patient {{$message->data['patient_name']}}
                            in subject {{$message->data['subject_name']}} on the date {{$message->data['date']}}
                            with chair number {{$message->data['chair_id']}}.
                            and has been assigned you for assistant.
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

