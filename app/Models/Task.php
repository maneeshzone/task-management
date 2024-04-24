<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'priority',
    ];
    
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['project'] ?? false, fn($query, $search) =>
            $query->where('project_id', $search)
        );
    }    
}
