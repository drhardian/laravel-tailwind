<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractActivityStoreRequest extends FormRequest
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
            'activity_id' => 'required|integer',
            'value' => 'required|integer',
            'contract_id' => 'required|integer'
        ];
    }
}
