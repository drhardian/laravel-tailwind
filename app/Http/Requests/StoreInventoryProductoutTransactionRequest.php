<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInventoryProductoutTransactionRequest extends FormRequest
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
            'date_request' => 'required|date_format:d/m/Y',
            'date_out' => 'required|date_format:d/m/Y',
            'requested_by' => 'required|exists:employees,id',
            'approved_by' => 'required|exists:employees,id',
            'product_id' => 'required|array'
        ];
    }
}
