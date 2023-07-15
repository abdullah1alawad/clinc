<?php

use Carbon\Carbon;

function calculateAge($birthdate)
{
    return Carbon::parse($birthdate)->diffInYears(Carbon::now());
}

function getLevel($val)
{
    switch ($val)
    {
        case 1:
            return 'First Year';
        case 2:
            return 'Second Year';
        case 3:
            return 'Third Year';
        case 4:
            return 'Fourth Year';
        case 5:
            return 'Fifth Year';
        default:
            return 'nothing';
    }
}

function getSemester($val)
{
    switch ($val)
    {
        case 1:
            return 'First Semester';
        case 2:
            return 'Second Semester';
        case 3:
            return 'Third Semester';
        default:
            return 'nothing';
    }
}

function saveImage($photo,$folder){
    //save photo in folder
    //folder must be full path ex:images/student or images

    $file_extension = $photo -> getClientOriginalExtension();
    $file_name = time().'.'.$file_extension;
    $path = $folder;
    $photo -> move($path,$file_name);

    return $file_name;
}
