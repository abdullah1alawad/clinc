@extends('layouts.app')

@section('head')
    @parent
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/patientInfo.js'])
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Booking Appointment</div>
                    <div class="card-body booking-class">
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="patient_id" class="col-md-2">{{ __('Patient Name:') }}</label>
                                <div class="col-md-4">
                                    <input type="hidden" value="{{$patient->id}}" name="patient_id">
                                    <input id="patient_id" type="text"
                                           class="form-control @error('patient_id') is-invalid @enderror"
                                           value="{{$patient->name}}" required autocomplete="patient_name" autofocus
                                           readonly>
                                    @error('patient_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="doctor_id" class="col-md-2">{{ __('Doctor Name:') }}</label>
                                <div class="col-md-4">
                                    <select class="form-control @error('doctor_id') is-invalid @enderror"
                                            name="doctor_id" id="doctor_id">
                                        @foreach($doctors as $doctor)
                                            <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('doctor_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="subject_id" class="col-md-2">{{ __('Subject Name:') }}</label>
                                <div class="col-md-4">
                                    <select class="form-control @error('subject_id') is-invalid @enderror"
                                            name="subject_id" id="subject_id">
                                        @foreach($subjects as $subject)
                                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('subject_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="photo" class="col-md-2 ">Photo: (optional)</label>

                                <div class="col-md-6">
                                    <input id="photo" type="file"
                                           class="form-control @error('photo') is-invalid @enderror" name="photo"
                                           value="{{ old('photo') }}" autocomplete="photo" autofocus>
                                    @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <input type="hidden" id="date" name="date" value="">
                            <input type="hidden" id="chair_id" name="chair_id" value="">

                            <div class="text-center py-4 patient-class">
                                <h2>Select a Date and Time Slot:</h2>

                                <section id="section1">
                                    <table class="calendar">
                                        <thead>

                                        <tr>
                                            <th>#</th>
                                            @foreach($week1 as $key => $value)
                                                @if($loop->iteration%4==1)
                                                    <th>
                                                        {{getDay($key)}} <br>
                                                        {{getYMD($key)}}
                                                    </th>
                                                @endif
                                            @endforeach
                                        </tr>

                                        </thead>
                                        <tbody id="calendar-body">
                                        <tr>
                                            <th>09:00</th>
                                            @foreach($week1 as $key => $value)
                                                @if($loop->iteration%4==1)
                                                    @if(count($value))
                                                        @if($value[0]!=-1)
                                                            <td class="available" id="{{$value[0]}}"
                                                                onclick="assignValue(this)"><span
                                                                    class="hidden-text"> {{$key}}</span></td>
                                                        @else
                                                            <td></td>
                                                        @endif
                                                    @else
                                                        <td class="booked"></td>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <th>10:30</th>
                                            @foreach($week1 as $key => $value)
                                                @if($loop->iteration%4==2)
                                                    @if(count($value))
                                                        @if($value[0]!=-1)
                                                            <td class="available" id="{{$value[0]}}"
                                                                onclick="assignValue(this)"><span
                                                                    class="hidden-text"> {{$key}}</span></td>
                                                        @else
                                                            <td></td>
                                                        @endif
                                                    @else
                                                        <td class="booked"></td>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <th>12:00</th>
                                            @foreach($week1 as $key => $value)
                                                @if($loop->iteration%4==3)
                                                    @if(count($value))
                                                        @if($value[0]!=-1)
                                                            <td class="available" id="{{$value[0]}}"
                                                                onclick="assignValue(this)"><span
                                                                    class="hidden-text"> {{$key}}</span></td>
                                                        @else
                                                            <td></td>
                                                        @endif
                                                    @else
                                                        <td class="booked"></td>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <th>01:30</th>
                                            @foreach($week1 as $key => $value)
                                                @if($loop->iteration%4==0)
                                                    @if(count($value))
                                                        @if($value[0]!=-1)
                                                            <td class="available" id="{{$value[0]}}"
                                                                onclick="assignValue(this)"><span
                                                                    class="hidden-text"> {{$key}}</span></td>
                                                        @else
                                                            <td></td>
                                                        @endif
                                                    @else
                                                        <td class="booked"></td>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </tr>
                                        </tbody>
                                    </table>
                                </section>

                                <section id="section2">
                                    <table class="calendar" id="section2">
                                        <thead>

                                        <tr>
                                            <th>#</th>
                                            @foreach($week2 as $key => $value)
                                                @if($loop->iteration%4==1)
                                                    <th>
                                                        {{getDay($key)}} <br>
                                                        {{getYMD($key)}}
                                                    </th>
                                                @endif
                                            @endforeach
                                        </tr>

                                        </thead>
                                        <tbody id="calendar-body">
                                        <tr>
                                            <th>09:00</th>
                                            @foreach($week2 as $key => $value)
                                                @if($loop->iteration%4==1)
                                                    @if(count($value))
                                                        @if($value[0]!=-1)
                                                            <td class="available" id="{{$value[0]}}"
                                                                onclick="assignValue(this)"><span
                                                                    class="hidden-text"> {{$key}}</span></td>
                                                        @else
                                                            <td></td>
                                                        @endif
                                                    @else
                                                        <td class="booked" id="0"></td>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <th>10:30</th>
                                            @foreach($week2 as $key => $value)
                                                @if($loop->iteration%4==2)
                                                    @if(count($value))
                                                        @if($value[0]!=-1)
                                                            <td class="available" id="{{$value[0]}}"
                                                                onclick="assignValue(this)"><span
                                                                    class="hidden-text"> {{$key}}</span></td>
                                                        @else
                                                            <td></td>
                                                        @endif
                                                    @else
                                                        <td class="booked" id="0"></td>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <th>12:00</th>
                                            @foreach($week2 as $key => $value)
                                                @if($loop->iteration%4==3)
                                                    @if(count($value))
                                                        @if($value[0]!=-1)
                                                            <td class="available" id="{{$value[0]}}"
                                                                onclick="assignValue(this)"><span
                                                                    class="hidden-text"> {{$key}}</span></td>
                                                        @else
                                                            <td></td>
                                                        @endif
                                                    @else
                                                        <td class="booked" id="0"></td>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <th>01:30</th>
                                            @foreach($week2 as $key => $value)
                                                @if($loop->iteration%4==0)
                                                    @if(count($value))
                                                        @if($value[0]!=-1)
                                                            <td class="available" id="{{$value[0]}}"
                                                                onclick="assignValue(this)"><span
                                                                    class="hidden-text"> {{$key}}</span></td>
                                                        @else
                                                            <td></td>
                                                        @endif
                                                    @else
                                                        <td class="booked" id="0"></td>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </tr>
                                        </tbody>
                                    </table>
                                </section>

                                <section id="section3">
                                    <table class="calendar" id="section3">
                                        <thead>

                                        <tr>
                                            <th>#</th>
                                            @foreach($week3 as $key => $value)
                                                @if($loop->iteration%4==1)
                                                    <th>
                                                        {{getDay($key)}} <br>
                                                        {{getYMD($key)}}
                                                    </th>
                                                @endif
                                            @endforeach
                                        </tr>

                                        </thead>
                                        <tbody id="calendar-body">
                                        <tr>
                                            <th>09:00</th>
                                            @foreach($week3 as $key => $value)
                                                @if($loop->iteration%4==1)
                                                    @if(count($value))
                                                        @if($value[0]!=-1)
                                                            <td class="available" id="{{$value[0]}}"
                                                                onclick="assignValue(this)"><span
                                                                    class="hidden-text"> {{$key}}</span></td>
                                                        @else
                                                            <td></td>
                                                        @endif
                                                    @else
                                                        <td class="booked" id="0"></td>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <th>10:30</th>
                                            @foreach($week3 as $key => $value)
                                                @if($loop->iteration%4==2)
                                                    @if(count($value))
                                                        @if($value[0]!=-1)
                                                            <td class="available" id="{{$value[0]}}"
                                                                onclick="assignValue(this)"><span
                                                                    class="hidden-text"> {{$key}}</span></td>
                                                        @else
                                                            <td></td>
                                                        @endif
                                                    @else
                                                        <td class="booked" id="0"></td>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <th>12:00</th>
                                            @foreach($week3 as $key => $value)
                                                @if($loop->iteration%4==3)
                                                    @if(count($value))
                                                        @if($value[0]!=-1)
                                                            <td class="available" id="{{$value[0]}}"
                                                                onclick="assignValue(this)"><span
                                                                    class="hidden-text"> {{$key}}</span></td>
                                                        @else
                                                            <td></td>
                                                        @endif
                                                    @else
                                                        <td class="booked" id="0"></td>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <th>01:30</th>
                                            @foreach($week3 as $key => $value)
                                                @if($loop->iteration%4==0)
                                                    @if(count($value))
                                                        @if($value[0]!=-1)
                                                            <td class="available" id="{{$value[0]}}"
                                                                onclick="assignValue(this)"><span
                                                                    class="hidden-text"> {{$key}}</span></td>
                                                        @else
                                                            <td></td>
                                                        @endif
                                                    @else
                                                        <td class="booked" id="0"></td>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </tr>
                                        </tbody>
                                    </table>
                                </section>

                                <section id="section4">
                                    <table class="calendar" id="section4">
                                        <thead>

                                        <tr>
                                            <th>#</th>
                                            @foreach($week4 as $key => $value)
                                                @if($loop->iteration%4==1)
                                                    <th>
                                                        {{getDay($key)}} <br>
                                                        {{getYMD($key)}}
                                                    </th>
                                                @endif
                                            @endforeach
                                        </tr>

                                        </thead>
                                        <tbody id="calendar-body">
                                        <tr>
                                            <th>09:00</th>
                                            @foreach($week4 as $key => $value)
                                                @if($loop->iteration%4==1)
                                                    @if(count($value))
                                                        @if($value[0]!=-1)
                                                            <td class="available" id="{{$value[0]}}"
                                                                onclick="assignValue(this)"><span
                                                                    class="hidden-text"> {{$key}}</span></td>
                                                        @else
                                                            <td></td>
                                                        @endif
                                                    @else
                                                        <td class="booked" id="0"></td>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <th>10:30</th>
                                            @foreach($week4 as $key => $value)
                                                @if($loop->iteration%4==2)
                                                    @if(count($value))
                                                        @if($value[0]!=-1)
                                                            <td class="available" id="{{$value[0]}}"
                                                                onclick="assignValue(this)"><span
                                                                    class="hidden-text"> {{$key}}</span></td>
                                                        @else
                                                            <td></td>
                                                        @endif
                                                    @else
                                                        <td class="booked" id="0"></td>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <th>12:00</th>
                                            @foreach($week4 as $key => $value)
                                                @if($loop->iteration%4==3)
                                                    @if(count($value))
                                                        @if($value[0]!=-1)
                                                            <td class="available" id="{{$value[0]}}"
                                                                onclick="assignValue(this)"><span
                                                                    class="hidden-text"> {{$key}}</span></td>
                                                        @else
                                                            <td></td>
                                                        @endif
                                                    @else
                                                        <td class="booked" id="0"></td>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <th>01:30</th>
                                            @foreach($week4 as $key => $value)
                                                @if($loop->iteration%4==0)
                                                    @if(count($value))
                                                        @if($value[0]!=-1)
                                                            <td class="available" id="{{$value[0]}}"
                                                                onclick="assignValue(this)"><span
                                                                    class="hidden-text"> {{$key}}</span></td>
                                                        @else
                                                            <td></td>
                                                        @endif
                                                    @else
                                                        <td class="booked" id="0"></td>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </tr>
                                        </tbody>
                                    </table>
                                </section>

                                <nav>
                                    <ul>
                                        <li><a href="#section1" class="active">1</a></li>
                                        <li><a href="#section2">2</a></li>
                                        <li><a href="#section3">3</a></li>
                                        <li><a href="#section4">4</a></li>
                                    </ul>
                                </nav>
                            </div>

                            <div class="col-md-12 text-center app">
                                <input type="submit" class="back-btn" name="changePassword"
                                       value="Booking Appointment"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function assignValue(tdElement) {
            let date = tdElement.innerText;
            let id = tdElement.id;
            document.getElementById("date").value = date;
            document.getElementById("chair_id").value = id;

            // Remove 'chosen' class from all td elements and add 'available' class
            let allTds = document.getElementsByTagName("td");
            for (let i = 0; i < allTds.length; i++) {
                if (allTds[i].classList.contains('chosen')) {
                    allTds[i].classList.remove('chosen');
                    allTds[i].classList.add('available');
                }
            }


            tdElement.classList.remove('available');
            tdElement.classList.add('chosen');
        }
    </script>

@endsection

