@extends('layouts.admin')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('content')
<div class="row animate-fade-in">
    <!-- Stats Cards -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card dashboard-card h-100 border-start border-5 border-primary">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="me-3">
                        <div class="text-primary fw-bold text-uppercase mb-1">Janji Temu Hari Ini</div>
                        <div class="h5 mb-0">{{ $todayAppointments->count() }}</div>
                    </div>
                    <div class="text-primary">
                        <i class="fas fa-calendar-day fa-2x"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-light py-2">
                <a href="{{ route('admin.appointments.index', ['date' => \Carbon\Carbon::today()->format('Y-m-d')]) }}" class="text-decoration-none text-primary">
                    <div class="d-flex align-items-center">
                        <span>Lihat Detail</span>
                        <i class="fas fa-arrow-right ms-auto"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card dashboard-card h-100 border-start border-5 border-warning">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="me-3">
                        <div class="text-warning fw-bold text-uppercase mb-1">Menunggu Konfirmasi</div>
                        <div class="h5 mb-0">{{ $pendingAppointments }}</div>
                    </div>
                    <div class="text-warning">
                        <i class="fas fa-clock fa-2x"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-light py-2">
                <a href="{{ route('admin.appointments.index', ['status' => 'pending']) }}" class="text-decoration-none text-warning">
                    <div class="d-flex align-items-center">
                        <span>Lihat Detail</span>
                        <i class="fas fa-arrow-right ms-auto"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card dashboard-card h-100 border-start border-5 border-success">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="me-3">
                        <div class="text-success fw-bold text-uppercase mb-1">Janji Temu Selesai</div>
                        <div class="h5 mb-0">{{ $completedAppointments }}</div>
                    </div>
                    <div class="text-success">
                        <i class="fas fa-check-circle fa-2x"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-light py-2">
                <a href="{{ route('admin.appointments.index', ['status' => 'completed']) }}" class="text-decoration-none text-success">
                    <div class="d-flex align-items-center">
                        <span>Lihat Detail</span>
                        <i class="fas fa-arrow-right ms-auto"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card dashboard-card h-100 border-start border-5 border-danger">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="me-3">
                        <div class="text-danger fw-bold text-uppercase mb-1">Pesan Baru</div>
                        <div class="h5 mb-0">{{ $unreadMessages }}</div>
                    </div>
                    <div class="text-danger">
                        <i class="fas fa-envelope fa-2x"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-light py-2">
                <a href="#" class="text-decoration-none text-danger">
                    <div class="d-flex align-items-center">
                        <span>Lihat Detail</span>
                        <i class="fas fa-arrow-right ms-auto"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Today's Appointments and Upcoming Appointments -->
<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card card-custom animate-fade-in">
            <div class="card-header bg-white">
                <h5 class="mb-0">Janji Temu Hari Ini</h5>
            </div>
            <div class="card-body p-0">
                @if($todayAppointments->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Waktu</th>
                                    <th>Nama</th>
                                    <th>Layanan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($todayAppointments as $appointment)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('H:i') }}</td>
                                    <td>{{ $appointment->name }}</td>
                                    <td>{{ $appointment->service->name }}</td>
                                    <td>{!! $appointment->status_label !!}</td>
                                    <td>
                                        <a href="{{ route('admin.appointments.show', $appointment) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/5445/5445197.png" alt="No Appointments" style="width: 100px; opacity: 0.5;">
                        <p class="text-muted mt-3">Tidak ada janji temu untuk hari ini</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-lg-6 mb-4">
        <div class="card card-custom animate-fade-in">
            <div class="card-header bg-white">
                <h5 class="mb-0">Janji Temu Mendatang</h5>
            </div>
            <div class="card-body p-0">
                @if($upcomingAppointments->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>Layanan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($upcomingAppointments as $appointment)
                                <tr>
                                    <td>{{ $appointment->appointment_date->format('d/m/Y') }} {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('H:i') }}</td>
                                    <td>{{ $appointment->name }}</td>
                                    <td>{{ $appointment->service->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.appointments.show', $appointment) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/5445/5445197.png" alt="No Appointments" style="width: 100px; opacity: 0.5;">
                        <p class="text-muted mt-3">Tidak ada janji temu mendatang</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Recent Messages and Quick Links -->
<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card card-custom animate-fade-in">
            <div class="card-header bg-white">
                <h5 class="mb-0">Pesan Terbaru</h5>
            </div>
            <div class="card-body p-0">
                @if($recentMessages->count() > 0)
                    <div class="list-group list-group-flush">
                        @foreach($recentMessages as $message)
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">{{ $message->name }} {{ $message->is_read ? '' : '<span class="badge bg-danger">Baru</span>' }}</h6>
                                <small>{{ $message->created_at->diffForHumans() }}</small>
                            </div>
                            <p class="mb-1">{{ $message->subject }}</p>
                            <small class="text-muted">{{ Str::limit($message->message, 50) }}</small>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/5662/5662990.png" alt="No Messages" style="width: 100px; opacity: 0.5;">
                        <p class="text-muted mt-3">Tidak ada pesan terbaru</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-lg-6 mb-4">
        <div class="card card-custom animate-fade-in">
            <div class="card-header bg-white">
                <h5 class="mb-0">Akses Cepat</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <a href="{{ route('admin.appointments.index') }}" class="text-decoration-none">
                            <div class="p-3 bg-light rounded text-center">
                                <i class="fas fa-calendar-check fa-2x text-primary mb-2"></i>
                                <h6 class="mb-0">Kelola Janji Temu</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('admin.services.index') }}" class="text-decoration-none">
                            <div class="p-3 bg-light rounded text-center">
                                <i class="fas fa-tools fa-2x text-primary mb-2"></i>
                                <h6 class="mb-0">Kelola Layanan</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('admin.testimonials.index') }}" class="text-decoration-none">
                            <div class="p-3 bg-light rounded text-center">
                                <i class="fas fa-star fa-2x text-primary mb-2"></i>
                                <h6 class="mb-0">Kelola Testimonial</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('admin.gallery.index') }}" class="text-decoration-none">
                            <div class="p-3 bg-light rounded text-center">
                                <i class="fas fa-images fa-2x text-primary mb-2"></i>
                                <h6 class="mb-0">Kelola Galeri</h6>
                            </div>
                        </a>
                    </div>
                </div>
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
    });
</script>
@endsection