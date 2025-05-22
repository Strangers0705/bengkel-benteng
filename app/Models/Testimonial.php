<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'position',
        'content',
        'rating',
        'image',
        'is_active'
    ];
    
    // Get active testimonials
    public static function getActive()
    {
        return self::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->get();
    }
}