<?php

namespace App\Http\Requests\RequestOrder;

use Illuminate\Foundation\Http\FormRequest;

class UnitrateUpdateRequest extends FormRequest
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
            'rate_name' => 'required|string'
        ];
    }
}