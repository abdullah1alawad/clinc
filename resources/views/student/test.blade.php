@extends('layouts.app')

@section('content')

    <div class="text-center">
        {{$completedAppointments->links()}}
    </div>

@endsection

