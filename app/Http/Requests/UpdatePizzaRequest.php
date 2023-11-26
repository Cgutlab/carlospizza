<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePizzaRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'  => 'required|string|max:80',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', //No Required
            'percent' => 'required|between:1,999',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name field must be a string.',
            'name.max' => 'The name field must not exceed 80 characters.',
            'percent.required' => 'The percent field is required.',
            'percent.between' => 'The percent field must be a numeric value between 1 and 999.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be of type: jpeg, png, jpg, or gif.',
            'image.max' => 'The image must not be larger than 2MB.',
        ];
    }
}