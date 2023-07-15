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
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => ['required','regex:/^[A-Za-z]+$/', 'string', 'max:255'],
            'mname' => ['required','regex:/^[A-Za-z]+$/', 'string', 'max:255'],
            'lname' => ['required','regex:/^[A-Za-z]+$/','string', 'max:255'],
            'mother_name' => ['required','regex:/^[A-Za-z]+$/','string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'birth_date'=>['required'],
            'birth_location'=>['required','regex:/^[A-Za-z0-9]+$/','string', 'max:255'],
            'national_id'=>['required','string', 'max:255'],
            'constraint'=>['required','regex:/^[A-Za-z]+$/','string', 'max:255'],
            'gender'=>['required'],
            'address'=>['required','regex:/^[A-Za-z0-9]+$/','string', 'max:255'],
            'phone'=>['required','string','max:255'],
//            'url' => [ 'image', 'max:2048'], // Replace 'photo' with the name of your input field
            'role'=>['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

//        $photoPath = null;
//
//        if (isset($data['url'])) {
//            $photo = $data['url'];
//            $photoPath = $photo->store('public/photos');
//
//            // Resize and save a thumbnail version of the photo
//            $thumbnailPath = 'public/thumbnails/' . $photo->hashName();
//            Image::make($photo)
//                ->fit(200, 200)
//                ->save(storage_path('app/' . $thumbnailPath));
//
//            $photoPath = $thumbnailPath;
//        }

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
//            'url' => $photoPath,
            'password' => Hash::make($data['password']),
        ]);

        $roles=$data['role_id'];
        $user->roles()->attach($roles);

        dd($user);
        return $user;

    }
}
