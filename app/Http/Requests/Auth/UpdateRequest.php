<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|regex:/^[А-Яа-яёЁ\s-]+$/iu',
            'surname' => 'required|regex:/^[А-Яа-яёЁ\s-]+$/iu',
            'patronymic' => 'nullable|regex:/^[А-Яа-яёЁ\s-]+$/iu',
            'mobile' => 'required',
            'birthDay' => 'sometimes',
            'newsSubscription' => 'sometimes|boolean',
            'email' => 'required|email',
            'avatar' => 'mimes:webp,jpg,jpeg,png|max:5000',
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'Заполните поле Имя',
            'name.regex' => 'Кириллица и без цифр',
            'surname.required' => 'Заполните поле Фамилия',
            'surname.regex' => 'Кириллица и без цифр',
            'patronymic.regex' => 'Кириллица и без цифр',
            'mobile.required' => 'Заполните поле телефон',
            'birthDay.required' => 'Введите дату рождения',
            'email.required' => 'Введите электронную почту',
            'email.email' => 'Неверный формат почты',
            'avatar.mimes' => 'Разрешенные форматы: PNG, JPEG, JPEG & WEBP',
            'avatar.max' => 'Максимальный размер 5МБ',
            'address.required' => 'Введите адрес',
            'index.required' => 'Введите индекс',
            'index.numeric' => 'Числовое значение'
        ];
    }
}
