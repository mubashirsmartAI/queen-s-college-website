<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'title',
        'content',
        'type',
        'publish_date',
        'expiry_date',
        'is_active',
        'is_featured'
    ];

    protected $casts = [
        'publish_date' => 'date',
        'expiry_date' => 'date',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
    ];
}
