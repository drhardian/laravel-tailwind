<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemtypeStoreRequest extends FormRequest
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
            'activity_id' => 'required|integer|exists:master_activity,id',
            'type_name' => 'required|string|unique:master_item_type,type_name'
        ];
    }
}
