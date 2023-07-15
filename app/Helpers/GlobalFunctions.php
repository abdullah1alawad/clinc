<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

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

if(!function_exists('changeWord'))
{
    function changeWord($word)
    {
        Log::info('hiiiiiiiiiiiiiiii');
        if(!strlen($word))
            return 'null';
        $word[0]=strtoupper($word[0]);
        return $word;
    }
}
