<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class LoginUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return !auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    #[ArrayShape(['login' => "string", 'password' => "string"])]
    public function rules(): array
    {
        return [
            'login' => 'required',
            'password' => 'required'
        ];
    }

    /**
     * @return string[]
     */
    #[ArrayShape(['login.required' => "string", 'password.required' => "string"])]
    public function messages(): array
    {
        return [
            'login.required' => 'Введите логин',
            'password.required'=> 'Введите пароль'
        ];
    }
}
