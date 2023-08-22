<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CostingStoreRequest extends FormRequest
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
            'client_id' => 'required|integer',
            'contract_id' => 'required|integer',
            'item_id' => 'required|integer',
            'unit_rate_id' => 'required|integer',
            'price' => 'required|integer'
        ];
    }

    public function messages(): array
    {
        return [
            'client_id.required' => 'Customer data could not be found',
            'client_id.integer' => 'Incorrect customer data',
            'contract_id.required' => 'Contract data could not be found',
            'contract_id.integer' => 'Incorrect contract data',
            'item_id.required' => 'Item field cannot be empty',
            'item_id.integer' => 'Incorrect item format',
            'unit_rate_id.required' => 'Unit rate field cannot be empty',
            'unit_rate_id.integer' => 'Incorrect unit rate format',
            'price.required' => 'Price field cannot be empty',
            'price.integer' => 'Incorrect price format',
        ];
    }
}
