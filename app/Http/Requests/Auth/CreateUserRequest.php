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
            'repeat_password' => 'required|same:password',
            'rules' => 'accepted'
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'Заполните поле Имя',
            'name.regex' => 'Кириллица и без цифр',
            'login.required' => 'Заполните поле',
            'login.unique' => 'Такой пользователь уже существует',
            'email.required' => 'Введите электронную почту',
            'email.email' => 'Неверный формат почты',
            'password.required' => 'Введите пароль',
            'password.min' => 'Минимум 6 знаков',
            'repeat_password.required' => 'Поле подтверждения пароля обязательно',
            'repeat_password.repeat' => 'Подтвердите пароль',
            'repeat_password.same' => 'Поле должно совпадать с паролем',
            'rules.accepted' => 'Для регистрации вы должны быть согласны с правилами регистрации'

        ];
    }
}
