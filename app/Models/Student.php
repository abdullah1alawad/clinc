<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use const http\Client\Curl\PROXY_HTTP;

class Student extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id','university_id',
        'level','semester',
        'email','email_verified_at',
        'created_at','updated_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'email_verified_at',
        'created_at','updated_at',
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function studentMarks()
    {
        return $this->hasMany(Student_mark::class);
    }
    public function processes(){
        return $this->hasMany(Process::class);
    }
    public function patents()
    {
        return $this->hasMany(Patient::class);
    }

    public function getLevelAttribute($val)
    {
        switch ($val)
        {
            case 1:
                return 'First Year';
            case 2:
                return 'Second Year';
            case 3:
                return 'Third Year';
            case 4:
                return 'Fourth Year';
            case 5:
                return 'Fifth Year';
            default:
                return 'nothing';
        }
    }

    public function getSemesterAttribute($val)
    {
        switch ($val)
        {
            case 1:
                return 'First Semester';
            case 2:
                return 'Second Semester';
            case 3:
                return 'Third Semester';
            default:
                return 'nothing';
        }
    }
}
