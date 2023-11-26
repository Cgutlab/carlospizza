<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
        $id = $this->route('order'); // Obtiene el valor del parámetro 'order' de la ruta

        return [
            'name' => 'required|string|max:80|unique:orders,name,' . $id,
            'price' => 'required|numeric|between:1,9999',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name field must be a string.',
            'name.max' => 'The name field must not exceed 80 characters.',
            'name.unique' => 'The name has already been taken.',
            'price.required' => 'The price field is required.',
            'price.numeric' => 'The price field must be a numeric value.',
            'price.between' => 'The price field must be between 1 and 9999.',
        ];
    }
}