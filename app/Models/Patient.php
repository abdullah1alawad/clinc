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
        'name','gender',
        'national_id',
        'birth_date',
        'height','weight',
        'address','job',
        'phone',
        'questions',
        'last_medical_scan_date',
        'personal_doctor_name',
        'currently_disease','skin_disease','skin_surgery',
        'reason_to_go_hospital',
        'reason_to_transform_blood','skin_tooth_disease',
        'reason_to_came',
        'signature',
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


    public function student(){
        return $this->belongsTo(User::class,'student_id','id');
    }

    public function doctor(){
        return $this->belongsTo(User::class,'doctor_id','id');
    }

    public function processes(){
        return $this->hasMany(Process::class);
    }

    public function diseases(){
        return $this->hasMany(Disease::class);
    }

    public function medicines(){
        return $this->hasMany(Medicine::class);
    }

    public function getGenderAttribute($val){
        return (!$val)?'Male':'Female';
    }

    public function setGenderAttribute($val){
        $this->attributes['gender']=strtolower($val)=='female'? 1 : 0;
    }

    public function getQuestionsAttribute($val){
        $ret = array();
        while($val != 0){
            if($val&1)
                $ret[]='YES';
            else
                $ret[]='NO';

            $val=(int)$val/2;
        }

        return $ret;
    }

//    public function setQuestionsAttribute($val){
//        $ans = pow(2,51);
//
//        for($i = 1;$i <= 50;$i++){
//            $ans += pow(2,$i) * $val[$i];
//        }
//
//        $this->attributes['questions'] = $ans;
//    }

}
