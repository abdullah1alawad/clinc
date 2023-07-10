<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\GlobalFunctions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username', 'fname', 'mname', 'lname','mother_name',
        'birth_date','birth_location',
        'national_id', 'constraint',
        'gender','sieve',
        'address',
        'email','phone',
        'password',
        'created_at','updated_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'created_at','updated_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function student()
    {
        return $this->hasOne(Student::class);
    }
    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }
    public function assistant()
    {
        return $this->hasOne(Assistant::class);
    }
    public function patient()
    {
        return $this->hasOne(Patient::class);
    }
    public function emergency()
    {
        return $this->hasOne(Emergency::class);
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function getGenderAttribute($val)
    {
        return (!$val)?'Male':'Female';
    }
}
