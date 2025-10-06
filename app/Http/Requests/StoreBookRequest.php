<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
        return [
            'book_name' => 'required|string|max:255',
            'book_author_name' => 'required|string|max:255',
            'book_price' => 'required|numeric|min:0',
            'book_stock' => 'required|integer|min:0',
            'book_status' => 'boolean',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'book_name.required' => 'El nombre del libro es obligatorio',
            'book_author_name.required' => 'El nombre del autor es obligatorio',
            'book_price.required' => 'El precio es obligatorio',
            'book_price.min' => 'El precio debe ser mayor o igual a 0',
            'book_stock.required' => 'El stock es obligatorio',
            'book_stock.min' => 'El stock debe ser mayor o igual a 0',
        ];
    }
}
