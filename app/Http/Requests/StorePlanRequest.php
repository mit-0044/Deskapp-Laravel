<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePlanRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'stripe_plan' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'time_period' => ['required', 'string'],
            'description' => ['required', 'string'],
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'stripe_plan.required' => 'Name is required',
            'price.required' => 'Price is required',
            'price.numeric' => 'Price must be a number',
            'time_period.required' => 'Please select time period',
            'description.required' => 'Description is required',
        ];
    }
}
