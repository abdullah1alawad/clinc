<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Emergency extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fu_id',
        'spare_phone_number',
        'home_number',
        'blood_type',
        'height',
        'weight',
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

    public function emergency()
    {
        return $this->belongsTo(User::class);
    }

    public function sensitivitys()
    {
        return $this -> hasMany(Sensitivity::class);
    }
    public function medicines()
    {
        return $this -> hasMany(Medicine::class);
    }
    public function diseases()
    {
        return $this -> hasMany(Disease::class);
    }
}
