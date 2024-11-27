<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'issue_type',
        'description',
        'attachments',
        'subject',
        'message',
        'priority',
    ];
}