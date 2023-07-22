<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePhotoRequest extends FormRequest
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
            'photo' => ['image', 'max:2048'], // Replace 'photo' with the name of your input field
        ];
    }

    public function messages()
    {
        return [
            'photo.image' => 'you must choose a valid image like png , jpg etc ....',
            'photo.max' => 'choose an image size less than or equal to 2048KB.',
        ];
    }
}
