<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = 'clients';
    protected $fillable = [
        'first_name',
        'last_name',
        'company',
        'email',
        'phone',
        'website',
        'skype',
        'country',
        'client_status_id',
    ];

    public function status()
    {
        return $this->belongsTo(ClientStatus::class, 'status_id');
    }
}