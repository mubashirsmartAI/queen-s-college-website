<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title',
        'description',
        'duration',
        'fee',
        'eligibility',
        'image',
        'is_active'
    ];

    protected $casts = [
        'fee' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    /**
     * Get the full URL for the course image
     */
    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return asset('images/nursing-student.jpg');
        }
        
        // If image path starts with 'courses/', prepend 'storage/'
        if (str_starts_with($this->image, 'courses/')) {
            return asset('storage/' . $this->image);
        }
        
        // Otherwise, return as is (for old images in slider/ or other folders)
        return asset($this->image);
    }
}
