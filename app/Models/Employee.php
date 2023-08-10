<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'emp_fname',
        'emp_midname',
        'emp_surname',
        'emp_email',
        'emp_mobile',
        'emp_gender',
        'emp_blood_group',
        'emp_dob',
        'emp_adharcard',
        'emp_pancard',
        'emp_image',
        'emp_emr_name_1',
        'emp_emr_mobile_1',
        'emp_emr_relationship_1',
        'emp_emr_name_2',
        'emp_emr_mobile_2',
        'emp_emr_relationship_2',
        'emp_address_line_1',
        'emp_address_line_2',
        'emp_country',
        'emp_state',
        'emp_city',
        'emp_pincode',
    ];
}
