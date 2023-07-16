<?php

use Carbon\Carbon;

if(!function_exists('calculateAge')) {
    function calculateAge($birthdate)
    {
        return Carbon::parse($birthdate)->diffInYears(Carbon::now());
    }
}

if(!function_exists('getLevel')) {
    function getLevel($val)
    {
        switch ($val) {
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
}


if(!function_exists('getSemester')) {
    function getSemester($val)
    {
        switch ($val) {
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
}

if(!function_exists('saveImage')) {
    function saveImage($photo, $folder)
    {
        //save photo in folder
        //folder must be full path ex:images/student or images

        $file_extension = $photo->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = $folder;
        $photo->move($path, $file_name);

        return $file_name;
    }
}
