<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
            'project_id' => ['required', 'numeric'],
            'transaction_type_id' => ['required', 'numeric'],
            'income_source_id' => ['required', 'numeric'],
            'amount' => ['required', 'numeric', 'min:0'],
            'currency_id' => ['required', 'numeric'],
            'transaction_date' => ['required', 'date'],
            'name' => ['required', 'string'],
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
            'project_id.required' => 'The project field is required.',
            'transaction_type_id.required' => 'The transaction type field is required.',
            'income_source_id.required' => 'The income source field is required.',
            'amount.required' => 'The amount field is required.',
            'amount.numeric' => 'The amount field must be a number.',
            'amount.min' => 'The amount field must be a number greater than zero.',
            'currency_id.required' => 'The currency field is required.',
            'transaction_date.required' => 'The transaction date field is required.',
            'transaction_date.date' => 'The transaction date field must be a valid date.',
            'name.required' => 'The name field is required.',
            'name.string' => 'The name field must be a string.',
        ];
    }
}
