<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookProcessRequest extends FormRequest
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
            'patient_id'=>['required'],
            'doctor_id'=>['required'],
            'subject_id'=>['required'],
            'chair_id'=>['required'],
            'date'=>['required'],
            'photo' => ['image', 'max:2048'],
        ];
    }

    public function messages()
    {
        return [
            'patient_id.required'=>'you must choose a patient.',
            'doctor_id.required'=>'you must choose a doctor.',
            'subject_id.required'=>'you must choose a subject.',
            'chair_id.required'=>'you must select a chair.',
            'date_id.required'=>'you must choose a time for your process.',
            'photo.image' => 'you must choose a valid image like png , jpg etc ....',
            'photo.max' => 'choose an image size less than or equal to 2048KB.',

        ];
    }
}
