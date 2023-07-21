<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    public function showRegistrationForm()
    {
        $roles=Role::where('name','LIKE','student')->orWhere('name','LIKE','doctor')->get();
        return view('auth.register',compact('roles'));
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    protected $redirectTo = RouteServiceProvider::HOME;



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Validation\Validator
     */
    protected function validator(array $data)
    {
        $errorMessages=[
            'name.required'=>'The name field is required.',
            'name.regex'=>'The name can have only letters.',
            'name.max'=>'The name must be less than or equal to 40 characters.',
            'national_id.required'=>'The national id field is required.',
            'national_id.regex'=>'The national id can only have numbers.',
            'national_id.max'=>'The national id must be less than or equal to 30 digits.',
            'gender.required'=>'The gender is required.',
            'phone.required'=>'The phone field is required.',
            'phone.regex'=>'The phone can only have a digits.',
            'phone.max'=>'The phone can only have 10 digits .',
            'photo.image'=>'you must choose a valid image like png , jpg etc ....',
            'photo.max'=>'choose an image size less than or equal to 2048KB.',
            'role_id.required'=>'you must choose your role.',
            'password.required'=>'The password field is required',
            'password.regex'=>'The password must have a letters and numbers and must contain at least one letter and one number.',
            'password.min'=>'The password should contain at least 8 characters.',
            'password.max'=>'The password can only have 20 characters.',
            'password.confirmed'=>'The password does not equal the confirm password.'
        ];
        return Validator::make($data, [
            'name' => ['required','regex:/^[A-Za-z\s]+$/', 'max:40'],
            'email'=>['required','email','unique:users'],
            'national_id'=>['required','regex:/^[0-9]+$/', 'max:30','unique:users'],
            'gender'=>['required'],
            'phone'=>['required','regex:/^[0-9]+$/','max:10','unique:users'],
            'photo' => ['image', 'max:2048'], // Replace 'photo' with the name of your input field
            'role_id'=>['required'],
            'password' => ['required', 'regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/', 'min:8','max:20', 'confirmed'],
        ],$errorMessages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $photoPath="123456.jpg";
        if(isset($data['photo']))
            $photoPath=saveImage($data['photo'],'images');

        $user=User::create([
            'name' => $data['name'],
            'email'=> $data['email'],
            'national_id' => $data['national_id'],
            'gender' => $data['gender'],
            'phone' => $data['phone'],
            'photo' => $photoPath,
            'password' => Hash::make($data['password']),
        ]);

        $roles=$data['role_id'];
        $user->roles()->attach($roles);

        return $user;
    }
}
