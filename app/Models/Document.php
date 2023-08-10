<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $table = 'documents';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'document',
        'project_id',
        'description',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
