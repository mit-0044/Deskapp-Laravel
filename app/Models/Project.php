<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'budget',
        'project_status_id',
        'client_id',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function status()
    {
        return $this->belongsTo(ProjectStatus::class, 'status_id');
    }
}
