<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required','regex:/^[A-Za-z\s]+$/', 'max:40'],
            'email'=>['required','email','unique:users'],
            'national_id'=>['required','regex:/^[0-9]+$/', 'max:30','unique:users'],
            'gender'=>['required'],
            'phone'=>['required','regex:/^[0-9]+$/','max:10','unique:users'],
            'password' => ['required', 'regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/', 'min:8','max:20', 'confirmed'],
        ];
    }

    public function messages()
    {
        return [
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
            'password.required'=>'The password field is required',
            'password.regex'=>'The password must have a letters and numbers and must contain at least one letter and one number.',
            'password.min'=>'The password should contain at least 8 characters.',
            'password.max'=>'The password can only have 20 characters.',
            'password.confirmed'=>'The password does not equal the confirm password.'
        ];
    }
}
