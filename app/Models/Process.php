<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Process extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fs_id',
        'fd_id',
        'fp_id',
        'fa_id',
        'fc_id',
        'photo',
        'created_at','updated_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at','updated_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function assistant()
    {
        return $this->belongsTo(Assistant::class);
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    public function chair()
    {
        return $this->belongsTo(Chair::class);
    }
}
