<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    // Table name (optional if it follows Laravel's naming convention)
    protected $table = 'branches';

    // Fillable attributes for mass assignment
    protected $fillable = [
        'name',
        'location_id',
        'created_by',
    ];

    // Relationships
    public function location()
    {
        return $this->belongsTo(Location::class);
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