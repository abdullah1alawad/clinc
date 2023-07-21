@extends('layouts.app')

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
                                </div>
                                <div class="field-container2 col-md-5">
                                    sub-mark : <input type="number" class="form-control @error('mark') is-invalid @enderror" name="mark[]" placeholder="Enter a value">
                                </div>
                            </div>
                            <br>
                            <input type="number" name="process_id" value="{{$student->process_id}}" hidden>
                            <button id="addFieldBtn" class="btn btn-primary" type="button">Add Another Field</button>&nbsp;&nbsp;
                            <button class="btn btn-primary" type="submit">submit</button>
                        </form>

                        @if($errors->any())
                            <div class="error-message">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection

