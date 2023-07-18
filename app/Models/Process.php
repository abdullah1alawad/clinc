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
        'student_id',
        'doctor_id',
        'patient_id',
        'assistant_id',
        'chair_id',
        'subject_id',
        'date',
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

    public function student(){
        return $this->belongsTo(User::class,'student_id','id');
    }

    public function doctor(){
        return $this->belongsTo(User::class,'doctor_id','id');
    }

    public function assistant(){
        return $this->belongsTo(User::class,'assistant_id','id');
    }

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function chair(){
        return $this->belongsTo(Chair::class);
    }

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function marks(){
        return $this->hasMany(Subprocess_mark::class);
    }

}
