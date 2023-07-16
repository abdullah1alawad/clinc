@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('student.store') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="university_id" class="col-md-4 col-form-label text-md-end">{{ __('University id') }}</label>

                                <div class="col-md-6">
                                    <input id="university_id" type="number" class="form-control @error('university_id') is-invalid @enderror" name="university_id" value="{{ old('university_id') }}" required autocomplete="university_id" autofocus>

                                    @error('university_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="level" class="col-md-4 col-form-label text-md-end">{{ __('Level') }}</label>

                                <div class="col-md-6">
                                    <input id="level" type="number" class="form-control @error('level') is-invalid @enderror" name="level" value="{{ old('level') }}" required autocomplete="level" autofocus>

                                    @error('level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="semester" class="col-md-4 col-form-label text-md-end">{{ __('Semester') }}</label>

                                <div class="col-md-6">
                                    <input id="semester" type="number" class="form-control @error('semester') is-invalid @enderror" name="semester" value="{{ old('semester') }}" required autocomplete="semester" autofocus>

                                    @error('semester')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
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
