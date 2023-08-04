@extends('layouts.app')

@section('head')
    @parent
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/studentProfile.js'])
@endsection

@section('content')

    @if(session('field'))
        <div class="alert alert-danger text-center">
            {{ session('field') }}
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
                            Student (<a href="{{route('show.student',$message->data['student_id'])}}">{{$message->data['student']}}</a>) wants to schedule an appointment to treat the
                            patient
                            (<a href="{{route('show.patient',$message->data['patient_id'])}}">{{$message->data['patient']}}</a>) in the subject {{$message->data['subject']}} on a
                            date {{$message->data['date']}} chair No: {{$message->data['chair_id']}}
                        </div>

                        {{--                        @if(isset($message->date['photo']))--}}
                        {{--                            <img src="{{asset('images/' . $user->photo)}}">--}}
                        {{--                        @endif--}}

                        <form action="{{route('process.accept')}}" method="post">
                            @csrf
                            <span style="font-weight: 600;margin-right: 1%">Chose a assistant:</span>
                            <select name="assistant_id">
                                @foreach($assistants as $assistant)
                                    <option value="{{$assistant->id}}">{{$assistant->name}}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="process_id" value="{{$message->data['process_id']}}">
                            <div class="row justify-content-center">
                                <a href="{{route('process.reject',$message->data['process_id'])}}" class="btn btn-danger col-md-2" style="margin: 1%;">Reject</a>
                                <input type="submit" class="btn btn-success col-md-2" style="margin: 1%;" value="Accept">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

