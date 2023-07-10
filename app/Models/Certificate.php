<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable=[
        'certificate_name',
        'url',
        'created_at','updated_at'
    ];

    protected $hidden=[
        'created_at','updated_at'
    ];

    public function certificateable()
    {
        return $this->morphTo();
    }
}
