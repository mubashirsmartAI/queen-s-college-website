<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $fillable = [
        'name',
        'description',
        'icon',
        'image',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
