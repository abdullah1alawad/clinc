@extends('layouts.app')

@section('head')
    @parent
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/studentProfile.js'])
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Sub Mark</div>

                    <div class="card-body">
                        <table>
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Mark</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($process_mark as $mark)
                                <tr>
                                    <td>{{$mark->name}}</td>
                                    <td>{{$mark->mark}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Total Mark</th>
                                <th>{{$process_mark->total_mark}}</th>
                            </tr>
                            </tfoot>
                        </table>
                        <div class="col-md-12 text-center">
                            <a href="{{ \Illuminate\Support\Facades\URL::previous() }}#completedAppointments"
                               class="back-btn">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

