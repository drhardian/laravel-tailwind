<?php

namespace App\Http\Requests\RequestOrder;

use Illuminate\Foundation\Http\FormRequest;

class ROStoreRequest extends FormRequest
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
            'contract_id' => 'required|integer',
            'ro_number' => 'required|max:255',
            'activity_code' => 'required|integer',
            'start_date' => 'required|date_format:d/m/Y',
            'end_date' => 'required|date_format:d/m/Y|after:start_date',
            'so_number' => 'required|max:255',
            'status' => 'required|integer'
        ];
    }
}
