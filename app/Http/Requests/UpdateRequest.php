<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'name' => ['required', 'regex:/^[A-Za-z\s]+$/', 'max:40'],
            'email' => ['required', 'email',  Rule::unique('users')->ignore(auth()->user()->id)],
            'national_id' => ['required', 'regex:/^[0-9]+$/', 'max:30', Rule::unique('users')->ignore(auth()->user()->id)],
            'gender' => ['required'],
            'phone' => ['required', 'regex:/^[0-9]+$/', 'max:10', Rule::unique('users')->ignore(auth()->user()->id)],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.regex' => 'The name can have only letters.',
            'name.max' => 'The name must be less than or equal to 40 characters.',
            'national_id.required' => 'The national id field is required.',
            'national_id.regex' => 'The national id can only have numbers.',
            'national_id.max' => 'The national id must be less than or equal to 30 digits.',
            'gender.required' => 'The gender is required.',
            'phone.required' => 'The phone field is required.',
            'phone.regex' => 'The phone can only have a digits.',
            'phone.max' => 'The phone can only have 10 digits .',
        ];
    }
}
