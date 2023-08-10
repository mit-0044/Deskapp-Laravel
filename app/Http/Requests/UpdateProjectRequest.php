<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
        $yesterday = Carbon::yesterday();
        $two_weeks_from_now = $yesterday->addWeeks(2);
        $end = Carbon::parse($this->end);
        $start = Carbon::parse($this->start);

        return [
            'name' => ['required', 'string', 'max:255'],
            'client_id' => ['required', 'numeric', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
            'budget' => ['required', 'numeric', 'max_digits:11'],
            'project_status_id' => ['required', 'numeric', 'max:255'],
            'description' => ['sometimes'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'client_id.required' => 'Please select client.',
            'start_date.required' => 'The start date field is required.',
            'end_date.required' => 'The end date field is required.',
            'budget.required' => 'The budget field is required.',
            'project_status_id.required' => 'Please select project status.',
        ];
    }
}
