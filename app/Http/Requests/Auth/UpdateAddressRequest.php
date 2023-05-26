<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'address' => 'required',
            'city' => 'required',
            'index' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'address.required' => 'Введите адрес',
            'index.required' => 'Введите индекс',
            'index.numeric' => 'Числовое значение',
            'city.required' => 'Введите город'
        ];
    }
}
