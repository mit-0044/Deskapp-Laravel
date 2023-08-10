<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'company' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'phone' => ['required', 'numeric', 'digits:10'],
            'country' => ['required', 'string'],
            'client_status' => ['required', 'string'],
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
            'first_name.required' => 'The first name field is required.',
            'last_name.required' => 'The last name field is required.',
            'company.required' => 'The company field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Invalid email.',
            'phone.required' => 'The phone field is required.',
            'phone.numeric' => 'The phone number contains numeric only.',
            'phone.digits' => 'The phone number contains 10 digits only.',
            'country.required' => 'The country field is required.',
            'client_status.required' => 'The client status field is required.',
        ];
    }
}
