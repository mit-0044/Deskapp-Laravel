<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
            'emp_fname' => ['required', 'string'],
            'emp_midname' => ['sometimes'],
            'emp_surname' => ['required', 'string'],
            'emp_email' => ['required', 'email'],
            'emp_mobile' => ['required', 'numeric', 'digits:10'],
            'emp_gender' => ['required', 'string'],
            'emp_blood_group' => ['required', 'string'],
            'emp_dob' => ['required', 'date'],
            'emp_adharcard' => ['required', 'numeric'],
            'emp_pancard' => ['required', 'string'],
            'emp_image' => ['sometimes'],
            'emp_emr_name_1' => ['required', 'string'],
            'emp_emr_mobile_1' => ['required', 'numeric'],
            'emp_emr_relationship_1' => ['required', 'string'],
            'emp_emr_name_2' => ['sometimes'],
            'emp_emr_mobile_2' => ['sometimes'],
            'emp_emr_relationship_2' => ['sometimes'],
            'emp_address_line_1' => ['required', 'string'],
            'emp_address_line_2' => ['sometimes'],
            'emp_country' => ['required', 'string'],
            'emp_state' => ['required', 'string'],
            'emp_city' => ['required', 'string'],
            'emp_pincode' => ['required', 'numeric'],
        ];
    }
    public function messages(): array
    {
        return [
            'emp_fname.required' => 'Firstname is required.',
            'emp_midname.sometimes' => 'Middlename is required.',
            'emp_surname.required' => 'Lastname is required.',
            'emp_email.required' => 'Email is required.',
            'emp_email.email' => 'Email must be a valid email address.',
            'emp_mobile.required' => 'Mobile no. is required.',
            'emp_mobile.numeric' => 'Mobile no. must be numeric.',
            'emp_mobile.digits' => 'Mobile no. must be 10 digits only.',
            'emp_gender.required' => 'Gender is required.',
            'emp_blood_group.required' => 'Blood Group is required.',
            'emp_dob.required' => 'Date of Birth is required.',
            'emp_adharcard.required' => 'Adharcard no. is required.',
            'emp_adharcard.numeric' => 'Adharcard no. must be numeric.',
            'emp_pancard.required' => 'Pancard is required.',
            'emp_image.sometimes' => 'Image is required.',
            'emp_emr_name_1.required' => 'Emergency person name is required.',
            'emp_emr_mobile_1.required' => 'Emergency person mobile no. is required.',
            'emp_emr_mobile_1.numeric' => 'Emergency person mobile no. must be numeric.',
            'emp_emr_mobile_1.digits' => 'Emergency person mobile no. must be 10 digits only.',
            'emp_emr_relationship_1.required' => 'Emergency person relationship is required.',
            'emp_emr_name_2.sometimes' => 'Emergency person name is required.',
            'emp_emr_mobile_2.sometimes' => 'Emergency person mobile no. is required.',
            'emp_emr_mobile_2.numeric' => 'Emergency person mobile no. must be numeric.',
            'emp_emr_mobile_2.digits' => 'Emergency person mobile no. must be 10 digits only.',
            'emp_emr_relationship_2.sometimes' => 'Emergency person relationship is required.',
            'emp_address_line_1.required' => 'Address is required.',
            'emp_address_line_2.sometimes' => 'Address is required.',
            'emp_country.required' => 'Country is requires.',
            'emp_state.required' => 'State is required.',
            'emp_city.required' => 'City is required.',
            'emp_pincode.required' => 'Pincode is required.',
            'emp_pincode.numeric' => 'Pincode must be numeric.',
            'emp_pincode.digits' => 'Pincode must be 6 digits only.',
        ];
    }
}
