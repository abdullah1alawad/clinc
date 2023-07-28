<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExistingAdminRequest extends FormRequest
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
            'national_id'=>['required','regex:/^[0-9]+$/', 'max:30'],
        ];
    }

    public function messages()
    {
        return [
            'national_id.required'=>'The national id field is required.',
            'national_id.regex'=>'The national id can only have numbers.',
            'national_id.max'=>'The national id must be less than or equal to 30 digits.',
        ];
    }
}
