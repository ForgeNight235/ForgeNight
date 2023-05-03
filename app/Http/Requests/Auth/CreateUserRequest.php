<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => 'required|regex:/^[А-Яа-яёЁ\s-]+$/iu',
            'login' => 'required|unique:users,login',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:6',
            'repeat_password' => 'required|min:6|same:password',
            'rules' => 'accepted'
        ];
    }
}
