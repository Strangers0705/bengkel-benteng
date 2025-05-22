@extends('layouts.admin')

@section('title', 'Edit Janji Temu')

@section('page-title', 'Edit Janji Temu')

@section('content')
<div class="row">
    <div class="col-lg-12 animate-fade-in">
        <div class="card card-custom">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Janji Temu</h5>
                    <a href="{{ route('admin.appointments.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.appointments.update', $appointment) }}" method="POST" class="form-custom">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <!-- Personal Information -->
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-3">Informasi Pribadi</h6>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $appointment->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $appointment->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Nomor Telepon <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $appointment->phone) }}" required>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Vehicle Information -->
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-3">Informasi Kendaraan</h6>
                            <div class="mb-3">
                                <label for="vehicle_make" class="form-label">Merek Mobil <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('vehicle_make') is-invalid @enderror" id="vehicle_make" name="vehicle_make" value="{{ old('vehicle_make', $appointment->vehicle_make) }}" required>
                                @error('vehicle_make')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="vehicle_model" class="form-label">Model Mobil <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('vehicle_model') is-invalid @enderror" id="vehicle_model" name="vehicle_model" value="{{ old('vehicle_model', $appointment->vehicle_model) }}" required>
                                @error('vehicle_model')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="vehicle_year" class="form-label">Tahun <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('vehicle_year') is-invalid @enderror" id="vehicle_year" name="vehicle_year" min="1900" max="{{ date('Y') + 1 }}" value="{{ old('vehicle_year', $appointment->vehicle_year) }}" required>
                                @error('vehicle_year')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Appointment Details -->
                        <div class="col-12 mt-4">
                            <h6 class="fw-bold mb-3">Detail Janji Temu</h6>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="service_id" class="form-label">Layanan <span class="text-danger">*</span></label>
                                    <select class="form-select @error('service_id') is-invalid @enderror" id="service_id" name="service_id" required>
                                        <option value="">Pilih Layanan</option>
                                        @foreach($services as $service)
                                            <option value="{{ $service->id }}" {{ old('service_id', $appointment->service_id) == $service->id ? 'selected' : '' }}>
                                                {{ $service->name }} - Rp {{ number_format($service->price, 0, ',', '.') }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('service_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                        <option value="pending" {{ old('status', $appointment->status) == 'pending' ? 'selected' : '' }}>Menunggu</option>
                                        <option value="confirmed" {{ old('status', $appointment->status) == 'confirmed' ? 'selected' : '' }}>Dikonfirmasi</option>
                                        <option value="completed" {{ old('status', $appointment->status) == 'completed' ? 'selected' : '' }}>Selesai</option>
                                        <option value="cancelled" {{ old('status', $appointment->status) == 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="appointment_date" class="form-label">Tanggal <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('appointment_date') is-invalid @enderror" id="appointment_date" name="appointment_date" value="{{ old('appointment_date', $appointment->appointment_date->format('Y-m-d')) }}" required>
                                    @error('appointment_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="appointment_time" class="form-label">Waktu <span class="text-danger">*</span></label>
                                    <select class="form-select @error('appointment_time') is-invalid @enderror" id="appointment_time" name="appointment_time" required>
                                        <option value="">Pilih Waktu</option>
                                        <option value="08:00:00" {{ old('appointment_time', \Carbon\Carbon::parse($appointment->appointment_time)->format('H:i:s')) == '08:00:00' ? 'selected' : '' }}>08:00 - 09:00</option>
                                        <option value="09:00:00" {{ old('appointment_time', \Carbon\Carbon::parse($appointment->appointment_time)->format('H:i:s')) == '09:00:00' ? 'selected' : '' }}>09:00 - 10:00</option>
                                        <option value="10:00:00" {{ old('appointment_time', \Carbon\Carbon::parse($appointment->appointment_time)->format('H:i:s')) == '10:00:00' ? 'selected' : '' }}>10:00 - 11:00</option>
                                        <option value="11:00:00" {{ old('appointment_time', \Carbon\Carbon::parse($appointment->appointment_time)->format('H:i:s')) == '11:00:00' ? 'selected' : '' }}>11:00 - 12:00</option>
                                        <option value="13:00:00" {{ old('appointment_time', \Carbon\Carbon::parse($appointment->appointment_time)->format('H:i:s')) == '13:00:00' ? 'selected' : '' }}>13:00 - 14:00</option>
                                        <option value="14:00:00" {{ old('appointment_time', \Carbon\Carbon::parse($appointment->appointment_time)->format('H:i:s')) == '14:00:00' ? 'selected' : '' }}>14:00 - 15:00</option>
                                        <option value="15:00:00" {{ old('appointment_time', \Carbon\Carbon::parse($appointment->appointment_time)->format('H:i:s')) == '15:00:00' ? 'selected' : '' }}>15:00 - 16:00</option>
                                        <option value="16:00:00" {{ old('appointment_time', \Carbon\Carbon::parse($appointment->appointment_time)->format('H:i:s')) == '16:00:00' ? 'selected' : '' }}>16:00 - 17:00</option>
                                    </select>
                                    @error('appointment_time')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="message" class="form-label">Pesan / Catatan</label>
                                <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="4">{{ old('message', $appointment->message) }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('admin.appointments.index') }}" class="btn btn-secondary me-2">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle sidebar
        const menuToggle = document.getElementById('menu-toggle');
        const wrapper = document.getElementById('wrapper');
        
        if (menuToggle) {
            menuToggle.addEventListener('click', function() {
                wrapper.classList.toggle('toggled');
            });
        }
        
        // Update available time slots based on selected date
        const dateField = document.getElementById('appointment_date');
        const timeField = document.getElementById('appointment_time');
        const currentSelectedTime = timeField.value;
        
        dateField.addEventListener('change', function() {
            const selectedDate = new Date(this.value);
            const dayOfWeek = selectedDate.getDay(); // 0 = Sunday, 6 = Saturday
            
            // Store the currently selected time
            const selectedTime = timeField.value;
            
            // Clear existing options except the first one
            while (timeField.options.length > 1) {
                timeField.remove(1);
            }
            
            // Different time slots for weekends
            if (dayOfWeek === 0) { // Sunday
                addTimeOption('09:00:00', '09:00 - 10:00');
                addTimeOption('10:00:00', '10:00 - 11:00');
                addTimeOption('11:00:00', '11:00 - 12:00');
                addTimeOption('12:00:00', '12:00 - 13:00');
            } else if (dayOfWeek === 6) { // Saturday
                addTimeOption('08:00:00', '08:00 - 09:00');
                addTimeOption('09:00:00', '09:00 - 10:00');
                addTimeOption('10:00:00', '10:00 - 11:00');
                addTimeOption('11:00:00', '11:00 - 12:00');
                addTimeOption('13:00:00', '13:00 - 14:00');
                addTimeOption('14:00:00', '14:00 - 15:00');
                addTimeOption('15:00:00', '15:00 - 16:00');
            } else { // Weekdays
                addTimeOption('08:00:00', '08:00 - 09:00');
                addTimeOption('09:00:00', '09:00 - 10:00');
                addTimeOption('10:00:00', '10:00 - 11:00');
                addTimeOption('11:00:00', '11:00 - 12:00');
                addTimeOption('13:00:00', '13:00 - 14:00');
                addTimeOption('14:00:00', '14:00 - 15:00');
                addTimeOption('15:00:00', '15:00 - 16:00');
                addTimeOption('16:00:00', '16:00 - 17:00');
                addTimeOption('17:00:00', '17:00 - 18:00');
            }
            
            // Try to preserve the previously selected time if it's still available
            for (let i = 0; i < timeField.options.length; i++) {
                if (timeField.options[i].value === selectedTime) {
                    timeField.value = selectedTime;
                    return;
                }
            }
        });
        
        function addTimeOption(value, text) {
            const option = document.createElement('option');
            option.value = value;
            option.textContent = text;
            option.selected = value === currentSelectedTime;
            timeField.appendChild(option);
        }
    });
</script>
@endsection