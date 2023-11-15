<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Contractor extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'position',
        'slug'
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getSlugAttribute(): string
    {
        return Str::slug($this->name);
    }
    
}
