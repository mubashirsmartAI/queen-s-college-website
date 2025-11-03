<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'qualification',
        'experience',
        'specialization',
        'email',
        'phone',
        'image',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
