<?php

namespace App\Http\Requests\SiteWalkDown;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class AssessmentStoreRequest extends FormRequest
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
        $ultrasonic_leak_validation = [];
        $voc_leak_validation = [];

        if(request('leak_detection_method')) {
            $ultrasonic_leak_validation = [
                'value_a' => 'integer|min_digits:0|max_digits:1000',
                'value_b' => 'integer|min_digits:0|max_digits:1000',
                'value_c' => 'integer|min_digits:0|max_digits:1000',
                'value_d' => 'integer|min_digits:0|max_digits:1000',
                'passing_detection_result' => 'min:0|max_digits:1000',
                'leak_out_value' => 'integer|min_digits:0|max_digits:1',
                'leak_out_result' => 'integer|min_digits:0|max_digits:1',
            ];
        }

        if(request('voc_leak_value')) {
            $ultrasonic_leak_validation = [
                'voc_leak_value' => 'sometimes|required|integer|min_digits:0|max_digits:1',
            ];
        }

        return array_merge([
            'id' => 'required|max:36',
            'instruction_id' => 'required',
            'device_type_id' => 'required|integer',
            'criticality_level_id' => 'required|integer',
            // 'health_rating_id' => 'required|integer',
            'company_id' => 'required|integer',
            'activity_date' => 'required|date',
            'serial_number' => 'required|max:255',
            'application' => 'required|max:255',
            'health_level_color' => 'min:7|max:7',
            'final_recommendation' => 'min:2|max:255',
            'rigging_point_needed' => 'string|min:2|max:29',
            'rigging_point_available' => 'string|min:2|max:29',
            'scaffolding_required' => 'string|min:2|max:29',
            'leak_detection_method' => 'sometimes|required|integer|min_digits:0|max_digits:1',
            // 'value_a' => 'integer|min_digits:0|max_digits:1000',
            // 'value_b' => 'integer|min_digits:0|max_digits:1000',
            // 'value_c' => 'integer|min_digits:0|max_digits:1000',
            // 'value_d' => 'integer|min_digits:0|max_digits:1000',
            // 'passing_detection_result' => 'min:0|max_digits:1000',
            // 'leak_out_value' => 'integer|min_digits:0|max_digits:1',
            // 'leak_out_result' => 'integer|min_digits:0|max_digits:1',
            // 'voc_leak_value' => 'sometimes|required|integer|min_digits:0|max_digits:1',
            'voc_leak_report_path' => 'sometimes|required|min:2|max:255',
            'assessment_record_status' => 'integer|min:1|max:1',
        ], $ultrasonic_leak_validation, $ultrasonic_leak_validation);
    }

    protected function prepareForValidation()
    {
        $activityDate = Carbon::createFromFormat('d/m/Y', $this->activity_date);

        $this->merge([
            'activity_date' => $activityDate,
        ]);

        return $this->all();
    }
}
