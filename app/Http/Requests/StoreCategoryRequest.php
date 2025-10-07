<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'category_name' => 'required|string|max:255',
            'category_description' => 'required|string',
            'category_priority' => 'required|integer|min:0',
            'category_status' => 'required|boolean',
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
            'category_name.required' => 'El nombre de la categoría es obligatorio',
            'category_name.max' => 'El nombre no puede exceder 255 caracteres',
            'category_description.required' => 'La descripción es obligatoria',
            'category_priority.required' => 'La prioridad es obligatoria',
            'category_priority.integer' => 'La prioridad debe ser un número entero',
            'category_priority.min' => 'La prioridad debe ser mayor o igual a 0',
            'category_status.required' => 'El estado es obligatorio',
            'category_status.boolean' => 'El estado debe ser verdadero o falso',
        ];
    }
}
