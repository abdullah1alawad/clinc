<?php

use Carbon\Carbon;

function calculateAge($birthdate)
{
    return Carbon::parse($birthdate)->diffInYears(Carbon::now());
}
