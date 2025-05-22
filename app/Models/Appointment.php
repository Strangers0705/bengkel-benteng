<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'email',
        'phone',
        'service_id',
        'vehicle_make',
        'vehicle_model',
        'vehicle_year',
        'appointment_date',
        'appointment_time',
        'message',
        'status'
    ];
    
    protected $dates = [
        'appointment_date',
        'created_at',
        'updated_at'
    ];
    
    // Status constants
    const STATUS_PENDING = 'pending';
    const STATUS_CONFIRMED = 'confirmed';
    const STATUS_COMPLETED = 'completed';
    const STATUS_CANCELLED = 'cancelled';
    
    // Appointment belongs to a service
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    
    // Get status label with color for display
    public function getStatusLabelAttribute()
    {
        return match($this->status) {
            self::STATUS_PENDING => '<span class="badge bg-warning">Menunggu</span>',
            self::STATUS_CONFIRMED => '<span class="badge bg-primary">Dikonfirmasi</span>',
            self::STATUS_COMPLETED => '<span class="badge bg-success">Selesai</span>',
            self::STATUS_CANCELLED => '<span class="badge bg-danger">Dibatalkan</span>',
            default => '<span class="badge bg-secondary">Unknown</span>',
        };
    }
}