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
        'email', 'name', 'gender',
        'phone',
        'photo',
        'national_id',
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
        'password' => 'hashed',
    ];


    public function studentPatients(){
        return $this->hasMany(Patient::class,'student_id','id');
    }

    public function doctorPatients(){
        return $this->hasMany(Patient::class,'doctor_id','id');
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function studentProcesses(){
        return $this->hasMany(Process::class,'student_id','id');
    }

    public function doctorProcesses(){
        return $this->hasMany(Process::class,'doctor_id','id');
    }

    public function assistantProcesses(){
        return $this->hasMany(Process::class,'assistant_id','id');
    }

    public function studentMarks(){
        return $this->hasMany(Student_mark::class,'student_id','id');
    }

    public function getGenderAttribute($val){
        return (!$val)?'Male':'Female';
    }

//    public function setGenderAttribute($val){
//        $this->attributes['gender']=strtolower($val)=='female'? 1 : 0;
//        dd($this->attributes['gender']);
//    }
}
