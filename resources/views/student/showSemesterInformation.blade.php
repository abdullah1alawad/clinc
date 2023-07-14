<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/css/show-style.css')}}">

    <title>Show Semester Information</title>
</head>
<body>
<nav class="navbar">
    <div class="navdiv">
        <ul>
            <li><a href="{{route('student.profile')}}">Profile</a></li>
            <a href="{{route('student.show.semester',['id'=>auth()->user()->id])}}">Details</a>
            <li><a href="{{route('student.semester.marks')}}">Marks</a></li>
            <li><a href="">Sub-marks</a></li>
        </ul>
    </div>
</nav>
<section>
    <h1 class="title">Details</h1>

    <div class="questions-container">

        <div class="tab-buttons">
            @foreach($semesterUserInfo as $subject=>$data)
                <button class="tab-button {{ $loop->first ? 'active' : '' }}" data-tab="{{$subject}}" style="background: cornflowerblue;border-radius: 44px;" onclick="toggleTabContent('{{$subject}}')">{{$subject}}</button>
            @endforeach
        </div>

        <br>
        @foreach($semesterUserInfo as $subject=>$data)
        <div class="tab-content {{$loop->first ? 'active' :''}}" id="{{$subject}}">

            @foreach($data as $item)
                <div class="question" id="{{$subject}}" style="background: cornflowerblue; border-color: black;border-radius: 45px;">
                    <button style="background: cornflowerblue">
                        <span>Process {{' '.($loop->index+1)}}</span>
                        <i class="fas fa-chevron-down d-arrow"></i>
                    </button>
                    <p style="color: black;">
                        Doctor: {{$item[0]->fname . ' ' .$item[0]->lname}}<br>
                        Patient: {{$item[1]->fname . ' ' .$item[1]->lname}}<br>
                        Assistant: {{$item[2]->fname . ' '.$item[2]->lname}}<br>
                        Chair: {{$item[3]}}<br>
                        Photo:  {{$item[4]}}<br>
                        Created At: {{$item[5]}}<br>
                        marks: {{$item[6]}}
                    </p>
                </div>
            @endforeach
        </div>
        @endforeach
    </div>

    <br><br><br><br>

</section>

<script src="{{asset('assets/js/show-app.js')}}"></script>


</body>
</html>
