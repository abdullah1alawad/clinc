<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Patient extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fu_id','fs_id','fd_id',
        'questions',
        'job',
        'last_scan_date',
        'personal_doctor_name',
        'reason_to_go_hospital',
        'reason_to_transform_blood',
        'reason_to_came',
        'photo_url',
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

    public function patient()
    {
        return $this -> belongsTo(User::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function processes(){
        return $this->hasMany(Process::class);
    }

}
