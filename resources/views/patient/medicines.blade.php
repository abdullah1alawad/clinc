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
                    <div class="card-header">Medicines</div>

                    <div class="card-body">
                        <table>
                            <thead>
                            <tr>
                                <th>Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($medicines as $medicine)
                                <tr>
                                    <td>{{$medicine->name}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="col-md-12 text-center">
                            <a href="{{ \Illuminate\Support\Facades\URL::previous() }}"
                               class="back-btn">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

