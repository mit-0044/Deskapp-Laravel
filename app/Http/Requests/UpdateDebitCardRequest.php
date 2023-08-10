<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDebitCardRequest extends FormRequest
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
            'arg_fname' => ['required', 'string'],
            'arg_midname' => ['required', 'string'],
            'arg_surname' => ['required', 'string'],
            'arg_email' => ['required', 'email'],
            'arg_mobile' => ['required', 'numeric', 'digits:10'],
            'arg_dob' => ['required', 'date'],
            'arg_ifsc' => ['required', 'string'],
            'arg_bank' => ['required', 'string'],
            'arg_branch' => ['required', 'string'],
            'arg_account' => ['required', 'numeric', 'digits:15'],
            'arg_confirm_account' => ['required', 'numeric', 'digits:15', 'same:arg_account'],
            'arg_account_type' => ['required', 'string'],
            'arg_card_type' => ['required', 'array'],
            'arg_service_type' => ['required', 'array'],
            'arg_documents' => ['sometimes', 'array'],
            'arg_address_line_1' => ['required', 'string'],
            'arg_address_line_2' => ['sometimes'],
            'arg_country' => ['required', 'string'],
            'arg_state' => ['required', 'string'],
            'arg_city' => ['required', 'string'],
            'arg_pincode' => ['required', 'numeric', 'digits:6'],
        ];
    }
    public function messages()
    {
        return [
            'arg_fname' => 'First name is required.',
            'arg_midname' => 'Middle name is required.',
            'arg_surname' => 'Surname is required.',
            'arg_email.required' => 'Email is required.',
            'arg_email.email' => 'Please enter a valid email address.',
            'arg_mobile.required' => 'Mobile no is required.',
            'arg_mobile.numeric' => 'Mobile no contain numbers only.',
            'arg_mobile.digits' => 'Mobile no contain 10 digis only.',
            'arg_dob' => 'Date of birth is required.',
            'arg_ifsc' => 'IFSC code is required',
            'arg_bank' => 'Bank name is required.',
            'arg_branch' => 'Branch name is required.',
            'arg_account.required' => 'Account no. is required.',
            'arg_account.numeric' => 'Account no. contain numbers only.',
            'arg_account.digits' => 'Account no. contain 15 digits only.',
            'arg_confirm_account.required' => 'Confirm account no. is required.',
            'arg_confirm_account.numeric' => 'Confirm account no. contain numbers only.',
            'arg_confirm_account.digits' => 'Confirm account no. contain 15 digits only.',
            'arg_confirm_account.same' => 'Confirm account no. must be same as Account no.',
            'arg_account_type' => 'Account type is required.',
            'arg_card_type.required' => 'Debit Card type is required.',
            'arg_card_type.array' => 'Debit Card type is array type.',
            'arg_service_type.required' => 'Service type is required.',
            'arg_service_type.array' => 'Atleast 2 Services types are required.',
            'arg_documents.required' => 'Documents are required.',
            'arg_address_line_1' => 'Address is required.',
            'arg_address_line_2' => 'Address is required.',
            'arg_country' => 'Country is required.',
            'arg_state' => 'State is required.',
            'arg_city' => 'City is required.',
            'arg_pincode' => 'Pincode is required.',
        ];
    }
}
