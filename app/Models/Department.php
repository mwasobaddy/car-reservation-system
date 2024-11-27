<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    // Table name (optional if it follows Laravel's naming convention)
    protected $table = 'departments';

    // Fillable attributes for mass assignment
    protected $fillable = [
        'name',
        'directorate_id',
        'created_by',
        'updated_by',
    ];

    // Relationships
    public function directorate()
    {
        return $this->belongsTo(Directorate::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'user_id');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by', 'user_id');
    }
}