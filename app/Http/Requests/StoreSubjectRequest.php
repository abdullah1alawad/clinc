<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubjectRequest extends FormRequest
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
            'name' => ['required', 'regex:/^[0-9A-Za-z\s]+$/', 'max:40'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.regex' => 'The name can have only letters.',
            'name.max' => 'The name must be less than or equal to 40 characters.',
        ];
    }
}
