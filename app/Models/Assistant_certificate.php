<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assistant_certificate extends Model
{
    use HasFactory;

    protected $fillable=[
        'fa_id',
        'certificate_name',
        'photo',
        'created_at','updated_at'
    ];

    protected $hidden=[
        'created_at','updated_at'
    ];

    public function assistant()
    {
        return $this->belongsTo(Assistant::class);
    }
}
