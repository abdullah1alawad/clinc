@extends('layouts.app')

@section('head')
    @parent
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/studentProfile.js'])
@endsection

@section('content')

    <div class="my-class text-center">
        hello
    </div>

@endsection

