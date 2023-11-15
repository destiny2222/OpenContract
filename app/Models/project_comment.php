<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project_comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'message',
        'contractor_id',
        'project_id',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
