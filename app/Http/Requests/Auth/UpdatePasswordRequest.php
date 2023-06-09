<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
            'password' => 'min:6',
            'repeatPassword' => 'min:6|same:password'
        ];
    }

    public function messages()
    {
        return [
            'password.min' => 'Минимум 6 символов в пароле',
            'repeatPassword.min' => 'Минимум 6 символов',
            'repeatPassword.same' => 'Пароли не совпадают'
        ];
    }
}
