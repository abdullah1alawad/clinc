@extends('layouts.app')

@section('head')
    @parent
    <link rel="stylesheet" href="{{asset('css/search.css')}}">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
@endsection

@section('content')

    @if(isset($message))
        <div class="alert alert-info text-center">
            {{ $message }}
        </div>
    @endif

    <div class="container emp-profile">

        <div class="card">
            <div class="card-header">
                search
            </div>
            <div class="card-body">

                <div class="search-container">
                    <div class="col-md-3" style="margin-left: 900px;">
                        <a href="{{ route('search.patient.page',1) }}" class="profile-edit-btn">Show all users</a>
                    </div>
                    <form id="searchForm" action="{{ route('search.patient', ['national_id' => Request::get('national_id')]) }}" method="get">
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
                @if(count($patients))
                    <table>
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($patients as $patient)
                            <tr>
                                <td>{{$patient->name}}</td>
                                <td>
                                    <form action="{{route('show.patient',$patient->id)}}" method="get">
                                        <button class="btn btn-link">show profile</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        @endif
                    </table>
            </div>
            <br><br>
            <div class="col-md-1 text-center" style="margin-left: 400px">
                {!!$patients->links() !!}
            </div>
        </div>
        <div class="col-md-12 text-center">
            @if(auth()->user()->roles()->where('name','student')->first())
                <a href="{{ route('student.profile') }}"
                   class="back-btn">Back</a>
            @elseif(auth()->user()->roles()->where('name','doctor')->first())
                <a href="{{ route('doctor.profile') }}"
                   class="back-btn">Back</a>
            @else
                <a href="{{ route('admin.profile') }}"
                   class="back-btn">Back</a>
            @endif

        </div>
    </div>

@endsection
