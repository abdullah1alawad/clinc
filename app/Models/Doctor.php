<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Doctor extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fu_id',
        'recruitment_division',
        'military_status',
        'family_status',
        'mother_language',
        'driving_license',
        'email',
        'email_verified_at',
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
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function doctor(){
        return $this->belongsTo(User::class);
    }

    public function processes(){
        return $this->hasMany(Process::class);
    }

    public function patents()
    {
        return $this->hasMany(Patient::class);
    }

    //skills lang and degrees relation are not done yat don't forget that
}
