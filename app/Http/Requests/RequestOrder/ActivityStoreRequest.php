<?php

namespace App\Http\Requests\RequestOrder;

use Illuminate\Foundation\Http\FormRequest;

class ActivityStoreRequest extends FormRequest
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
            'activity_code' => 'required|string|unique:master_activity,activity_code|max:10',
            'activity_name' => 'required|string|unique:master_activity,activity_name|max:50',
            'unit_rate_id' => 'required|array'
        ];
    }
}
