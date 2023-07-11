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
