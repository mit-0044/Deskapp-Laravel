<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DebitCard extends Model
{
    use HasFactory;
    protected $fillable = [
            'arg_id',
            'arg_fname',
            'arg_surname',
            'arg_email',
            'arg_mobile',
            'arg_dob',
            'arg_ifsc',
            'arg_bank',
            'arg_branch',
            'arg_account',
            'arg_confirm_account',
            'arg_account_type',
            'arg_card_type',
            'arg_service_type',
            'arg_document',
            'arg_address_line_1',
            'arg_address_line_2',
            'arg_country',
            'arg_state',
            'arg_city',
            'arg_pincode',
            'arg_status',
    ];
}
