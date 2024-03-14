<?php

namespace App\Http\Requests\SiteWalkDown;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class InstructionStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'date_activity_start' => 'required|date',
            'date_activity_end' => 'required|date',
            'company_id' => 'required|integer',
            'area_id' => 'integer',
            'area_others' => 'sometimes|array',
            'tag_numbers' => 'sometimes|array',
            'engineers' => 'array',
            'notes' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'date_activity_start.required' => 'Start activity date is required',
            'date_activity_start.date' => 'Incorrect start activity date',
            'date_activity_end.required' => 'End activity date is required',
            'date_activity_end.date' => 'Incorrect end activity date',
            'company_id.required' => 'Company field is required',
            'company_id.integer' => 'Incorrect company format',
            'area_id.integer' => 'Incorrect area format',
            'area_others.array' => 'Incorrect other area format',
            'tag_numbers.array' => 'Incorrect tag number format',
            'engineers.array' => 'Incorrect engineer format',
            'notes.required' => 'Instructions field is required'
        ];
    }

    protected function prepareForValidation()
    {
        $dateToArray = explode(" - ", $this->date_activity);
        $dateStart = Carbon::createFromFormat('d/m/Y', $dateToArray[0]);
        $dateEnd = Carbon::createFromFormat('d/m/Y', $dateToArray[1]);

        $this->merge([
            'date_activity_start' => $dateStart,
            'date_activity_end' => $dateEnd
        ]);

        return $this->all();
    }
}
