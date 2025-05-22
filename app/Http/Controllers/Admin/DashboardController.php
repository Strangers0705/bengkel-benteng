<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Appointment;
use App\Models\Contact;
use App\Models\Testimonial;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Show admin dashboard
     */
    public function index()
    {
        $todayAppointments = Appointment::whereDate('appointment_date', Carbon::today())
            ->orderBy('appointment_time')
            ->get();
            
        $pendingAppointments = Appointment::where('status', Appointment::STATUS_PENDING)
            ->count();
            
        $completedAppointments = Appointment::where('status', Appointment::STATUS_COMPLETED)
            ->count();
            
        $unreadMessages = Contact::where('is_read', false)
            ->count();
            
        $serviceCount = Service::count();
        
        $testimonialCount = Testimonial::where('is_active', true)
            ->count();
            
        $upcomingAppointments = Appointment::where('status', Appointment::STATUS_CONFIRMED)
            ->whereDate('appointment_date', '>=', Carbon::today())
            ->orderBy('appointment_date')
            ->orderBy('appointment_time')
            ->take(5)
            ->get();
            
        $recentMessages = Contact::orderBy('created_at', 'desc')
            ->take(5)
            ->get();
            
        return view('admin.dashboard', compact(
            'todayAppointments',
            'pendingAppointments',
            'completedAppointments',
            'unreadMessages',
            'serviceCount',
            'testimonialCount',
            'upcomingAppointments',
            'recentMessages'
        ));
    }
}