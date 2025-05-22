<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Service;

class AdminAppointmentController extends Controller
{
    /**
     * Display a listing of appointments
     */
    public function index(Request $request)
    {
        $status = $request->get('status');
        $date = $request->get('date');
        
        $query = Appointment::with('service')->orderBy('created_at', 'desc');
        
        if ($status) {
            $query->where('status', $status);
        }
        
        if ($date) {
            $query->whereDate('appointment_date', $date);
        }
        
        $appointments = $query->paginate(10);
        
        return view('admin.appointments.index', compact('appointments'));
    }

    /**
     * Show appointment details
     */
    public function show(Appointment $appointment)
    {
        return view('admin.appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing an appointment
     */
    public function edit(Appointment $appointment)
    {
        $services = Service::orderBy('name')->get();
        return view('admin.appointments.edit', compact('appointment', 'services'));
    }

    /**
     * Update the appointment
     */
    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'service_id' => 'required|exists:services,id',
            'vehicle_make' => 'required|string|max:50',
            'vehicle_model' => 'required|string|max:50',
            'vehicle_year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
            'status' => 'required|in:pending,confirmed,completed,cancelled',
            'message' => 'nullable|string'
        ]);
        
        $appointment->update($request->all());
        
        return redirect()->route('admin.appointments.index')->with('success', 'Janji temu berhasil diperbarui');
    }

    /**
     * Remove the appointment
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        
        return redirect()->route('admin.appointments.index')->with('success', 'Janji temu berhasil dihapus');
    }
    
    /**
     * Update appointment status
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled'
        ]);
        
        $appointment = Appointment::findOrFail($id);
        $appointment->update(['status' => $request->status]);
        
        return redirect()->back()->with('success', 'Status janji temu berhasil diperbarui');
    }
}