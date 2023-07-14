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



</body>
</html>
