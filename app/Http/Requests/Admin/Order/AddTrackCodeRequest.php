<?php

namespace App\Http\Requests\Admin\Order;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class AddTrackCodeRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    #[ArrayShape(['track' => "string"])] public function rules(): array
    {
        return [
            'track' => 'required|numeric'
        ];
    }

    /**
     * @return string[]
     */
    #[ArrayShape(['track.required' => "string", 'track.string' => "string", 'track.max' => "string", 'track.min' => "string", 'track.numeric' => "string"])] public function messages(): array
    {
        return [
            'track.required' => 'Поле трек-кода является обязательным.',
            'track.max' => 'Трек-код не должен превышать :max символов.',
            'track.min' => 'Трек-код должен содержать :min символов.',
            'track.numeric' => 'Трек-код должен состоять только из цифр.',
        ];
    }

}
