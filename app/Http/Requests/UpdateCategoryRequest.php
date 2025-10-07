<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'category_name' => 'sometimes|string|max:255',
            'category_description' => 'sometimes|string',
            'category_priority' => 'sometimes|integer|min:0',
            'category_status' => 'sometimes|boolean',
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
            'category_name.max' => 'El nombre no puede exceder 255 caracteres',
            'category_priority.integer' => 'La prioridad debe ser un número entero',
            'category_priority.min' => 'La prioridad debe ser mayor o igual a 0',
            'category_status.boolean' => 'El estado debe ser verdadero o falso',
        ];
    }
}
