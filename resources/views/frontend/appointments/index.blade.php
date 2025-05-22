@extends('layouts.app')

@section('title', 'Booking Appointment - Bengkel Mobil Beteng Betawi')

@section('content')
    <!-- Appointment Hero -->
    <section class="hero-section" style="background-image: url('https://images.pexels.com/photos/3806249/pexels-photo-3806249.jpeg?auto=compress&cs=tinysrgb&w=1600');">
        <div class="container">
            <div class="hero-content text-white">
                <h1 class="display-4 fw-bold">Booking Janji Temu</h1>
                <p class="lead">Jadwalkan servis mobil Anda dengan mudah dan cepat</p>
            </div>
        </div>
    </section>

    <!-- Appointment Form -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="appointment-form mb-5">
                        <div class="text-center mb-4">
                            <h2 class="fw-bold">Formulir Booking</h2>
                            <p>Isi formulir di bawah ini untuk membuat janji temu dengan mekanik kami</p>
                        </div>
                        
                        <form action="{{ route('appointments.store') }}" method="POST" id="appointmentForm" onsubmit="return validateAppointmentForm()">
                            @csrf
                            <div class="row">
                                <!-- Personal Information -->
                                <div class="col-md-6">
                                    <h5 class="fw-bold mb-3">Informasi Pribadi</h5>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Nomor Telepon <span class="text-danger">*</span></label>
                                        <input type="tel" class="form-control" id="phone" name="phone" required>
                                    </div>
                                </div>
                                
                                <!-- Vehicle Information -->
                                <div class="col-md-6">
                                    <h5 class="fw-bold mb-3">Informasi Kendaraan</h5>
                                    <div class="mb-3">
                                        <label for="vehicle_make" class="form-label">Merek Mobil <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="vehicle_make" name="vehicle_make" placeholder="contoh: Toyota, Honda, etc." required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="vehicle_model" class="form-label">Model Mobil <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="vehicle_model" name="vehicle_model" placeholder="contoh: Avanza, Civic, etc." required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="vehicle_year" class="form-label">Tahun <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="vehicle_year" name="vehicle_year" min="1900" max="{{ date('Y') + 1 }}" value="2020" required>
                                    </div>
                                </div>

                                <!-- Appointment Details -->
                                <div class="col-12 mt-4">
                                    <h5 class="fw-bold mb-3">Detail Janji Temu</h5>
                                    <div class="mb-3">
                                        <label for="service_id" class="form-label">Layanan <span class="text-danger">*</span></label>
                                        <select class="form-select" id="service_id" name="service_id" required>
                                            <option value="">Pilih Layanan</option>
                                            @foreach($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->name }} - Rp {{ number_format($service->price, 0, ',', '.') }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="appointment_date" class="form-label">Tanggal <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="appointment_date" name="appointment_date" min="{{ $today }}" max="{{ $maxDate }}" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="appointment_time" class="form-label">Waktu <span class="text-danger">*</span></label>
                                            <select class="form-select" id="appointment_time" name="appointment_time" required>
                                                <option value="">Pilih Waktu</option>
                                                <option value="08:00:00">08:00 - 09:00</option>
                                                <option value="09:00:00">09:00 - 10:00</option>
                                                <option value="10:00:00">10:00 - 11:00</option>
                                                <option value="11:00:00">11:00 - 12:00</option>
                                                <option value="13:00:00">13:00 - 14:00</option>
                                                <option value="14:00:00">14:00 - 15:00</option>
                                                <option value="15:00:00">15:00 - 16:00</option>
                                                <option value="16:00:00">16:00 - 17:00</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="message" class="form-label">Keterangan Tambahan</label>
                                        <textarea class="form-control" id="message" name="message" rows="4" placeholder="Jelaskan keluhan atau masalah kendaraan Anda"></textarea>
                                    </div>
                                </div>
                                
                                <div class="col-12 text-center">
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="terms" required>
                                        <label class="form-check-label" for="terms">Saya setuju dengan <a href="#" class="text-primary">syarat dan ketentuan</a> yang berlaku</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg px-5">Konfirmasi Booking</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Appointment Info -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="fw-bold mb-4">Informasi Penting</h2>
                    <div class="mb-4">
                        <h5 class="fw-bold">Persiapan Sebelum Servis</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check text-primary me-2"></i> Pastikan mobil dalam kondisi bersih untuk memudahkan inspeksi</li>
                            <li class="mb-2"><i class="fas fa-check text-primary me-2"></i> Siapkan dokumen kendaraan seperti STNK</li>
                            <li class="mb-2"><i class="fas fa-check text-primary me-2"></i> Catat keluhan atau masalah yang dialami kendaraan</li>
                            <li class="mb-2"><i class="fas fa-check text-primary me-2"></i> Kosongkan barang berharga dari dalam kendaraan</li>
                        </ul>
                    </div>
                    <div>
                        <h5 class="fw-bold">Kebijakan Pembatalan</h5>
                        <p>Jika Anda perlu membatalkan atau mengubah jadwal janji temu, mohon informasikan minimal 6 jam sebelumnya melalui telepon atau WhatsApp.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.pexels.com/photos/3807329/pexels-photo-3807329.jpeg?auto=compress&cs=tinysrgb&w=1600" alt="Service Information" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Update available time slots based on selected date
        const dateField = document.getElementById('appointment_date');
        const timeField = document.getElementById('appointment_time');
        
        dateField.addEventListener('change', function() {
            const selectedDate = new Date(this.value);
            const dayOfWeek = selectedDate.getDay(); // 0 = Sunday, 6 = Saturday
            
            // Clear existing options except the first one
            const firstOption = timeField.options[0];
            timeField.innerHTML = '';
            timeField.appendChild(firstOption);
            
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
        });
        
        function addTimeOption(value, text) {
            const option = document.createElement('option');
            option.value = value;
            option.textContent = text;
            timeField.appendChild(option);
        }
    });
</script>
@endsection