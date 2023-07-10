<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable=[
        'skill_name',
        'created_at','updated_at'
    ];

    protected $hidden=[
        'created_at','updated_at'
    ];

    public function skillable()
    {
        return $this->morphTo();
    }
}
