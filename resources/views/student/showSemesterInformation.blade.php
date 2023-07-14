<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/css/show-style.css')}}">

    <title>Show Semester Iformation</title>
</head>
<body>

<section>
    <h1 class="title">Details</h1>

    <div class="questions-container">

        <div class="tab-buttons">
            @foreach($semesterUserSubjects as $subject=>$cnt)
            <button class="tab-button active" data-tab="tab1" style="background: cornflowerblue;border-radius: 44px;">{{$subject}}</button>
            @endforeach
        </div>

        <br>

        <div class="tab-content active" id="tab1">
            @for($i=1;$i<=sizeof($semesterUserSubjects);$i++)
            <div class="question" style="background: cornflowerblue; border-color: black;border-radius: 45px;">
                <button style="background: cornflowerblue">
                    <span>Process {{' '.$i}}</span>
                    <i class="fas fa-chevron-down d-arrow"></i>
                </button>
                <p style="color: black;">Start With A wing fast, efficiently and without missing any important information, then you should consider enrolling in an online course.</p>
            </div>
            @endfor
        </div>
    </div>
    <br><br><br><br>
    <center>
        <h4 class="tab-button active" style="background: cornflowerblue;border-radius: 44px;width: 200px;text-decoration: none;"><a href="{{route('student.profile')}}">back to profile</a></h4>
    </center>
</section>
<script src="{{asset('assets/js/show-app.js')}}"></script>


</body>
</html>
