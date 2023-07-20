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

    protected $redirectTo = RouteServiceProvider::STUDENT_KEEP_REGISTER;



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
            'fname.required'=>'The first name field is required.',
            'fname.regex'=>'The first name can only have small letters.',
            'fname.max'=>'The first name must be less than or equal to 20 characters.',
            'mname.required'=>'The middle name field is required.',
            'mname.regex'=>'The middle name can only have small letters.',
            'mname.max'=>'The middle name must be less than or equal to 20 characters.',
            'lname.required'=>'The last name field is required.',
            'lname.regex'=>'The last name can only have small letters.',
            'lname.max'=>'The last name must be less than or equal to 20 characters.',
            'mother_name.required'=>'The mother name field is required.',
            'mother_name.regex'=>'The mother name can only have small letters.',
            'mother_name.max'=>'The mother name must be less than or equal to 20 characters.',
            'username.required'=>'The username field is required.',
            'username.max'=>'The username must be less than or equal to 20 characters.',
            'username.regex'=>'The username can have small letters and numbers and . and _ and it must contain at least one small letter.',
            'username.unique'=>'This username name is taken.',
            'birth_date.required'=>'The birth date is required.',
            'birth_location.required'=>'The birth location field is required.',
            'birth_location.regex'=>'The birth location can only have small letters.',
            'birth_location.max'=>'The birth location must be less than or equal to 30 characters.',
            'national_id.required'=>'The national id field is required.',
            'national_id.regex'=>'The national id can only have numbers.',
            'national_id.max'=>'The national id must be less than or equal to 30 digits.',
            'constraint.required'=>'The constraint field is required.',
            'constraint.regex'=>'The constraint field can only have small letters.',
            'constraint.max'=>'The constrain can only have 30 small letters.',
            'gender.required'=>'The gender is required.',
            'address.required'=>'The address field is required.',
            'address.regex'=>'The address field can only have a small letters.',
            'address.max'=>'The address can only have 30 small letters.',
            'phone.required'=>'The phone field is required.',
            'phone.regex'=>'The phone can only have a digits.',
            'phone.max'=>'The phone can only have 10 digits .',
            'url.image'=>'you must choose a valid image like png , jpg etc ....',
            'url.max'=>'choose an image size less than or equal to 2048KB.',
            'role_id.required'=>'you must choose your role.',
            'password.required'=>'The password field is required',
            'password.regex'=>'The password must have a letters and numbers and must contain at least one letter and one number.',
            'password.min'=>'The password should contain at least 8 characters.',
            'password.max'=>'The password can only have 20 characters.',
            'password.confirmed'=>'The password does not equal the confirm password.'
        ];
        return Validator::make($data, [
            'fname' => ['required','regex:/^[a-z]+$/', 'max:20'],
            'mname' => ['required','regex:/^[a-z]+$/', 'max:20'],
            'lname' => ['required','regex:/^[a-z]+$/', 'max:20'],
            'mother_name' => ['required','regex:/^[a-z]+$/', 'max:20'],
            'username' => ['required', 'regex:/^(?=.*[a-z])[a-z0-9_.]+$/', 'max:20', 'unique:users'],
            'birth_date'=>['required'],
            'birth_location'=>['required','regex:/^[a-z]+$/', 'max:30'],
            'national_id'=>['required','regex:/^[0-9]+$/', 'max:30','unique:users'],
            'constraint'=>['required','regex:/^[a-z]+$/', 'max:30'],
            'gender'=>['required'],
            'address'=>['required','regex:/^[a-z0-9]+$/', 'max:30'],
            'phone'=>['required','regex:/^[0-9]+$/','max:10','unique:users'],
            'url' => ['image', 'max:2048'], // Replace 'photo' with the name of your input field
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
        $role=Role::find($data['role_id']);

        if($role->role_name=='doctor')
            $this->redirectTo=RouteServiceProvider::DOCTOR_KEEP_REGISTER;

        $photoPath="123456.jpg";
        if(isset($data['url']))
            $photoPath=saveImage($data['url'],'images');

        $user=User::create([
            'fname' => $data['fname'],
            'mname' => $data['mname'],
            'lname' => $data['lname'],
            'username' => $data['username'],
            'mother_name' => $data['mother_name'],
            'birth_date' => $data['birth_date'],
            'birth_location' => $data['birth_location'],
            'national_id' => $data['national_id'],
            'constraint' => $data['constraint'],
            'gender' => $data['gender'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'url' => $photoPath,
            'password' => Hash::make($data['password']),
        ]);

        $roles=$data['role_id'];
        $user->roles()->attach($roles);

        return $user;

    }

}
