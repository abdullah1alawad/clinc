@extends('layouts.app')

@section('head')
    @parent
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/doctorProfile.js','resources/js/set-sub-marks.js'])
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$student->name . ' : '}} Sub-Marks</div>
                    <div class="card-body">

                        <table>
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Mark</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($process_mark as $mark)
                                <tr>
                                    <td>{{$mark->name}}</td>
                                    <td>{{$mark->mark}}</td>
                                    <td>
                                        <form action="{{route('doctor.deleteSubmarks',$mark->id)}}" method="post">
                                            @method('DELETE') @csrf
                                            <button class="btn btn-link">delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Total Mark</th>
                                <th>{{$process_mark->total_mark}}</th>
                                <th></th>

                            </tr>
                            </tfoot>
                        </table>
                        <form id="dynamicForm" action="{{route('doctor.storeSubmarks',$student->process_id)}}" method="post">
                        @csrf
                            <div id="fieldWrapper">
                                <!-- The first field -->
                                <div class="field-container1 col-md-5">
                                    sub-process name : <input type="text" class="form-control @error('name') is-invalid @enderror" name="name[]" placeholder="Enter a value">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="field-container2 col-md-5">
                                    sub-mark : <input type="number" class="form-control @error('mark') is-invalid @enderror" name="mark[]" placeholder="Enter a value">
                                    @error('mark')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <input type="number" name="process_id" value="{{$student->process_id}}" hidden>
                            <button id="addFieldBtn" class="btn btn-primary" type="button">Add Another Field</button>&nbsp;&nbsp;
                            <button class="btn btn-primary" type="submit">submit</button>
                        </form>

                        @if($errors->any())
                            <div class="error-message">
                                <p class="btn-danger" style="background: white;color: red">{{$errors->first()}}</p>
                            </div>
                        @endif

                        <div class="col-md-12 text-center">
                            <a href="{{ \Illuminate\Support\Facades\URL::route('doctor.profile',$student->id) }}#completedAppointments"
                               class="back-btn">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

