<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:32|string',
            'quantity' => 'integer|min:0',
            'collection_id' => 'required|exists:collections,id',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле "название товара" является обязательным.',
            'name.min' => 'Поле "название товара" должно содержать минимум :min символов.',
            'name.max' => 'Поле "название товара" должно содержать максимум :max символов.',
            'name.string' => 'Поле "название товара" должно быть строкой.',
            'quantity.integer' => 'Поле "количество" должно быть целым числом.',
            'quantity.min' => 'Значение поля "количество" должно быть не меньше :min.',
            'collection_id.required' => 'Поле "идентификатор коллекции" является обязательным.',
            'collection_id.exists' => 'Указанное значение поля "идентификатор коллекции" недопустимо.',
            'price.required' => 'Поле "цена" является обязательным.',
            'price.numeric' => 'Поле "цена" должно быть числовым.',
            'price.min' => 'Значение поля "цена" должно быть не меньше :min.',
            'description.string' => 'Поле "описание" должно быть строкой.',
        ];
    }

}
