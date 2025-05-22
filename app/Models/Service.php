<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'slug',
        'description',
        'short_description',
        'price',
        'image',
        'icon',
        'is_featured',
        'order'
    ];
    
    // Service has many appointments
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
    
    // Get featured services
    public static function getFeatured()
    {
        return self::where('is_featured', true)
            ->orderBy('order')
            ->get();
    }
}