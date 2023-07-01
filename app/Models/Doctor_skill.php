<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor_skill extends Model
{
    use HasFactory;

    protected $fillable=[
        'fd_id',
        'skill_name',
        'created_at','updated_at'
    ];

    protected $hidden=[
        'created_at','updated_at'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
