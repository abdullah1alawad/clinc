@extends('layouts.app')

@section('head')
    @parent
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/assistantProfile.js'])
@endsection

@section('content')

    <div class="container emp-profile">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img
                        src="{{asset('images/' . $user->photo)}}"
                        alt="image error"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>
                        {{$user->name}}
                    </h5>
                    <h6>
                        The Best Dentist In The World
                    </h6>
                </div>
            </div>
            <div class="col-md-2">
                <a href="{{route('assistant.profile.edit')}}" class="profile-edit-btn">Edit Profile</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-work">
                    <p>WORK SPACE</p>
                    <a href="">Search on Student</a><br/>
                    <a href="">Search on Patient</a><br/>
                    <a href="">Search on Patient</a><br/>
                </div>
            </div>
            <div class="col-md-8">
                <div class="tabs-sec">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="about-tab" data-toggle="tab" href="#about" role="tab"
                               aria-controls="about" aria-selected="true">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="upcomingAppointments-tab" data-toggle="tab"
                               href="#upcomingAppointments" role="tab"
                               aria-controls="upcomingAppointments" aria-selected="false">Your Upcoming Appointments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="completedAppointments-tab" data-toggle="tab"
                               href="#completedAppointments" role="tab"
                               aria-controls="completedAppointments" aria-selected="false">Your Completed
                                Appointments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="messages-tab" data-toggle="tab"
                               href="#messages" role="tab"
                               aria-controls="messages" aria-selected="false">
                                Messages
                                @if($user->unreadNotifications->count())
                                    <span class="notify-count">{{$user->unreadNotifications->count()}}</span>
                                @endif
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$user->name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$user->email}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Phone</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$user->phone}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>National Id</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$user->national_id}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Gender</label>
                            </div>
                            <div class="col-md-6">
                                @if($user->gender=='Male')
                                    <div class="radio-container">
                                        <input type="radio" id="male" name="gender" value="0" checked>
                                        <label for="male">Male</label>
                                    </div>
                                @else
                                    <div class="radio-container">
                                        <input type="radio" id="female" name="gender" value="1" checked>
                                        <label for="female">Female</label>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="upcomingAppointments" role="tabpanel"
                         aria-labelledby="upcomingAppointments-tab">
                        <table>
                            <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Patient Name</th>
                                <th>Assistant Name</th>
                                <th>Subject Name</th>
                                <th>Chair Number</th>
                                <th>Remaining Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($upcomingAppointments as $appointment)
                                <tr>
                                    <td>{{$appointment->student_name}}</td>
                                    <td>{{$appointment->patient_name}}</td>
                                    <td>{{$appointment->assistant_name}}</td>
                                    <td>{{$appointment->subject_name}}</td>
                                    <td>{{$appointment->chair_id}}</td>
                                    <td>{{$appointment->time_difference}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="completedAppointments" role="tabpanel"
                         aria-labelledby="completedAppointments-tab">

                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <h6>Press any row to show sub-mark</h6>

                            <form method="GET" action="{{ route('assistant.profile') }}">
                                <label for="subject" style="margin-right: 5px">Filter by subject:</label>
                                <select name="subject" id="subject">
                                    <option value="">All subjects</option>
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}"
                                            {{ request()->input('subject') == $subject->id ? 'selected' : '' }}>
                                            {{ $subject->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary" style="margin-left: 5px">Filter</button>
                            </form>
                        </div>

                        <table>
                            <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Patient Name</th>
                                <th>Assistant Name</th>
                                <th>Subject Name</th>
                                <th>Chair Number</th>
                                <th>Completion Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($completedAppointments as $appointment)
                                <tr>
                                    <td>{{$appointment->student_name}}</td>
                                    <td>{{$appointment->patient_name}}</td>
                                    <td>{{$appointment->assistant_name}}</td>
                                    <td>{{$appointment->subject_name}}</td>
                                    <td>{{$appointment->chair_id}}</td>
                                    <td>{{$appointment->date}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <br>
                        <div class="text-center">
                            {!!$completedAppointments->links() !!}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="messages" role="tabpanel"
                         aria-labelledby="messages-tab">

                        <div class="message-table">
                            <table>
                                <thead>
                                <tr>
                                    <th class="text-center" width="70%">Title</th>
                                    <th colspan="2" class="text-end">
                                        <form method="GET" action="{{ route('assistant.profile') }}">
                                            <input type="hidden" name="unread" value="1">
                                            <button type="submit" id="msg_btn" class="btn btn-outline-dark">Unread
                                                Messages
                                                Only
                                            </button>
                                        </form>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($messages as $message)
                                    @if(!$message->read_at)
                                        <tr class="alert alert-success notify-item" id="notify-{{$message->id}}">
                                    @else
                                        <tr class="alert alert-dark">
                                            @endif

                                            <td>
                                                [{{$message->created_at}}]
                                                Doctor {{$message->data['doctor_name']}} has been assigned you for assistant
                                            </td>

                                            <td class="text-end">

                                                @if(!$message->read_at)
                                                    <a href="#messages" class="mark-as-read"
                                                       data-id="{{$message->id}}">
                                                        Mark As Read
                                                    </a>
                                                @endif

                                            </td>
                                            <td class="text-end">

                                                <a href="{{route('assistant.message.info',['msg_id' => $message->id])}}">
                                                    More Details
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>

                            <div class="col-md-12 text-end py-2 my-link">
                                @if($user->unreadNotifications->count())
                                    <a href="#messages" class="mark-as-read" id="mark-all">Mark All As Read</a>
                                @endif
                            </div>

                        </div>
                        <div class="col-md-1 text-center" style="margin-left: 300px">
                            {!! $messages->links() !!}
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        function markNotificationAsRead(notificationId) {
            return $.ajax({
                url: '{{route('assistant.mark.notification')}}',
                type: 'post',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: notificationId,
                },
                success: function (response) {
                    // Update the UI to show that the notification has been marked as read
                    $('#notify-' + notificationId).removeClass('alert-success');
                    $('#notify-' + notificationId).addClass('alert-dark');
                    let count = $('.notify-count').innerHTML;
                    if (count > 1)
                        $('.notify-count').innerHTML = count - 1;
                    else
                        $('.notify-count').removeClass('notify-count').addClass('hidit');
                    // ...
                },
                error: function (xhr) {

                }
            });
        }

        function markAllNotificationsAsRead() {
            return $.ajax({
                url: '{{route('assistant.mark.notification')}}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    // Update the UI to show that all notifications have been marked as read
                    $('.notify-item').removeClass('alert-success');
                    $('.notify-item').addClass('alert-dark');
                    $('.notify-count').removeClass('notify-count').addClass('hidit');
                    $('.mark-as-read').removeClass('mark-as-read').addClass('hidit');
                    // ...
                },
                error: function (xhr) {
                    // Handle the error
                    // ...
                }
            });
        }

        $(function () {
            $('.mark-as-read').click(function () {

                //alert($(this).data('id'));
                event.preventDefault();
                markNotificationAsRead($(this).data('id'));
                $(this).removeClass('mark-as-read');
                $(this).addClass('hidit');
            });

            $('#mark-all').click(function () {
                event.preventDefault();
                markAllNotificationsAsRead();

            });
        });


    </script>
@endsection
