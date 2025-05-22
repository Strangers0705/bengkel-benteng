<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Appointment;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    /**
     * Display appointment form
     */
    public function index()
    {
        $services = Service::orderBy('name')->get();
        $today = Carbon::today()->format('Y-m-d');
        $maxDate = Carbon::today()->addMonths(3)->format('Y-m-d');
        
        return view('frontend.appointments.index', compact('services', 'today', 'maxDate'));
    }
    
    /**
     * Store a new appointment
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'service_id' => 'required|exists:services,id',
            'vehicle_make' => 'required|string|max:50',
            'vehicle_model' => 'required|string|max:50',
            'vehicle_year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required',
            'message' => 'nullable|string'
        ]);
        
        Appointment::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'service_id' => $request->service_id,
            'vehicle_make' => $request->vehicle_make,
            'vehicle_model' => $request->vehicle_model,
            'vehicle_year' => $request->vehicle_year,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'message' => $request->message,
            'status' => Appointment::STATUS_PENDING
        ]);
        
        return redirect()->route('appointments.success');
    }
    
    /**
     * Show success page
     */
    public function success()
    {
        return view('frontend.appointments.success');
    }
}