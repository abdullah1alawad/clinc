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
                        Add Subject
                    </div>
                    <div class="card-body">

                        <div class="text-end admin-btn">
                            <a href="{{route('admin.profile')}}" class="profile-edit-btn" style="padding: 1%;width: 20%">Profile</a>
                        </div>
                        <br>

                        <form method="POST" action="{{ route('store.subject') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name"
                                       class="col-md-4 col-form-label text-md-end">Subject Name:
                                </label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           name="name" value="{{ old('name') }}" required
                                           autofocus>

                                    @error('name')
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
                </div>
            </div>
        </div>
    </div>

@endsection

