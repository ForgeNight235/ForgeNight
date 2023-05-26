<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'name' => 'required|min:3|max:64',
            'price' => 'required|numeric',
            'collection_id' => 'required|exists:collections,id',
            'is_published' => 'sometimes'
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'Введите название товара',
            'name.min' => 'Минимум 3 символа',
            'name.max' => 'Максимум 32 символа',
            'price.required' => 'Введите стоимость',
            'price.numeric' => 'Только числовое значение',
            'collection_id.required' => 'Введите категорию товара',
            'is_published.required' => 'Дайте согласие на публикацию'
        ];
    }
}
