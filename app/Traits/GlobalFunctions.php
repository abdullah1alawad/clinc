<?php

namespace App\Traits;

use Carbon\Carbon;

trait GlobalFunctions
{
    public function calculateAge($birthdate)
    {
        return Carbon::parse($birthdate)->diffInYears(Carbon::now());
    }
}
