<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Assistant extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'recruitment_division','military_status',
        'family_status','mother_language',
        'driving_license',
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
    public function processes()
    {
        return $this->hasMany(Process::class);
    }
    public function skills()
    {
        return $this->morphMany(Skill::class,'skillable');
    }
    public function certificates()
    {
        return $this->morphMany(Certificate::class,'certificateable');
    }
    public function languages()
    {
        return $this->morphMany(Language::class,'languageable');
    }

    public function getDrivingLicenseAttribute($val)
    {
        return (!$val)?'NO':'Yes';
    }
    public function setDrivingLicenseAttribute($val)
    {
        $this->attributes['driving_license']=strtolower($val)=='yes'? 1 : 0;
    }
}
