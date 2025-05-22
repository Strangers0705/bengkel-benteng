<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'description',
        'image',
        'category',
        'is_active'
    ];
    
    // Get active gallery items
    public static function getActive()
    {
        return self::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->get();
    }
    
    // Get categories for filtering
    public static function getCategories()
    {
        return self::select('category')
            ->distinct()
            ->pluck('category');
    }
}