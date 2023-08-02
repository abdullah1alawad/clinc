@extends('layouts.app')

@section('head')
    @parent
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/adminProfile.js'])
@endsection

@section('content')

    <div class="container emp-profile">
        <div class="row">
            <div class="col-md-3">
                <div class="sidebar">
                    <p>WORK SPACE</p>
                    <a href="{{route('add.admin')}}">Add Admin</a>
                    <a href="{{route('patient.create')}}">Add Patient</a>
                    <a href="{{route('search.patient.page',1)}}">Search on Patient</a>
                    <a href="{{route('search.student.page')}}">Search on Student</a>
                    <a href="">Canceling a Chair Reservation</a>
                    <a href="{{route('add.subject')}}">Add Subject</a>
                    <a href="{{route('add.clinic')}}">Add Clinic</a>
                    <a href="{{route('add.chair')}}">Add Chair</a>
                </div>
            </div>

            <div class="col-md-9">
                <div class="row">
                    <div class="profile-head col-md-6">
                        <h5>
                            {{$user->name}}
                        </h5>
                        <h6>
                            Make Something Great!
                        </h6>
                    </div>
                    <div class="admin-btn col-md-6 text-end">
                        <a href="{{route('admin.edit.profile')}}" class="profile-edit-btn">Edit Profile</a>
                    </div>
                </div>
                <div class="tabs-sec">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="about-tab" data-toggle="tab" href="#about" role="tab"
                               aria-controls="about" aria-selected="true">About</a>
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
                    <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
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
                    <div class="tab-pane fade" id="messages" role="tabpanel"
                         aria-labelledby="messages-tab">

                        <div class="message-table">
                            <table>
                                <thead>
                                <tr>
                                    <th class="text-center" width="70%">Title</th>
                                    <th colspan="2" class="text-end">
                                        <form method="GET" action="{{ route('admin.profile') }}">
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
                                                [{{$message->created_at}}
                                                ] {{$message->data['user']}} {{$message->data['user_name']}}
                                                ({{$message->data['user_email']}}) has just registered
                                            </td>

                                            <td class="text-end">

                                                @if(!$message->read_at)
                                                    <a href="#messages" class="mark-as-read" data-id="{{$message->id}}">
                                                        Mark As Read
                                                    </a>
                                                @endif

                                            </td>
                                            <td class="text-end">

                                                <a href="{{route('message.info',['msg_id' => $message->id])}}">
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

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>

            function markNotificationAsRead(notificationId) {
                return $.ajax({
                    url: '{{route('mark.notification')}}',
                    type: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: notificationId,
                    },
                    success: function (response) {
                        // Update the UI to show that the notification has been marked as read
                        $('#notify-' + notificationId).removeClass('alert-success');
                        $('#notify-' + notificationId).addClass('alert-danger');
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
                    url: '{{route('mark.notification')}}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        // Update the UI to show that all notifications have been marked as read
                        $('.notify-item').removeClass('alert-success');
                        $('.notify-item').addClass('alert-danger');
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
