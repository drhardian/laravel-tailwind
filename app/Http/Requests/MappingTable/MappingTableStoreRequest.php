<?php

namespace App\Http\Requests\MappingTable;

use Illuminate\Foundation\Http\FormRequest;

class MappingTableStoreRequest extends FormRequest
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
            'category' => 'required|max:50',
            'prefix_title' => 'required|max:8|unique:mapping_tables,prefix_title',
            'description' => 'required|max:255',
        ];
    }
}
