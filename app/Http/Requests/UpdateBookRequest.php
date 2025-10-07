<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
            'book_name' => 'sometimes|string|max:255',
            'book_author_name' => 'sometimes|string|max:255',
            'book_price' => 'sometimes|numeric|min:0',
            'book_stock' => 'sometimes|integer|min:0',
            'book_status' => 'sometimes|boolean',
            'category_id' => 'sometimes|nullable|exists:categories,id_category',
            'barcode' => 'sometimes|nullable|string|max:255',
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
            'book_name.string' => 'El nombre del libro debe ser texto',
            'book_author_name.string' => 'El nombre del autor debe ser texto',
            'book_price.numeric' => 'El precio debe ser numérico',
            'book_price.min' => 'El precio debe ser mayor o igual a 0',
            'book_stock.integer' => 'El stock debe ser un número entero',
            'book_stock.min' => 'El stock debe ser mayor o igual a 0',
            'book_status.boolean' => 'El estado debe ser verdadero o falso',
            'category_id.exists' => 'La categoría seleccionada no existe',
        ];
    }
}
