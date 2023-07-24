@extends('layouts.app')

@section('head')
    @parent
    <link rel="stylesheet" href="{{asset('css/search.css')}}">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js',])
@endsection

@section('content')
    <div class="container emp-profile">
        <div class="card">
            <div class="card-header">
                search
            </div>
            <div class="card-body">
                <div class="search-container">
                    <form id="searchForm" action="{{route('doctor.search.student')}}" method="get">
                        <div class="container">
                            <div class="search_wrap search_wrap_3">
                                <div class="search_box">
                                    <input type="text" name="national_id" class="input" placeholder="search..." style="background: #bacbe6">
                                    <button type="submit" class="btn btn_common">
                                        <i class="fas fa-search" ></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @if($errors->any())
                            <div class="error-message">
                                <p class="btn-danger" style="background: white;color: red;text-align: center;">{{$errors->first()}}</p>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
