@extends('layouts.admin')

@section('title', 'Detail Janji Temu')

@section('page-title', 'Detail Janji Temu')

@section('content')
<div class="row">
    <div class="col-xl-8 col-lg-7 animate-fade-in">
        <div class="card card-custom mb-4">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Informasi Janji Temu</h5>
                    <div>
                        <a href="{{ route('admin.appointments.index') }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-arrow-left me-1"></i> Kembali
                        </a>
                        <a href="{{ route('admin.appointments.edit', $appointment) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-edit me-1"></i> Edit
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6 class="fw-bold mb-3">Informasi Pribadi</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td style="width: 120px;"><strong>Nama</strong></td>
                                <td>{{ $appointment->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Email</strong></td>
                                <td>{{ $appointment->email }}</td>
                            </tr>
                            <tr>
                                <td><strong>Telepon</strong></td>
                                <td>{{ $appointment->phone }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-bold mb-3">Informasi Kendaraan</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td style="width: 120px;"><strong>Merek</strong></td>
                                <td>{{ $appointment->vehicle_make }}</td>
                            </tr>
                            <tr>
                                <td><strong>Model</strong></td>
                                <td>{{ $appointment->vehicle_model }}</td>
                            </tr>
                            <tr>
                                <td><strong>Tahun</strong></td>
                                <td>{{ $appointment->vehicle_year }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6 class="fw-bold mb-3">Detail Janji Temu</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td style="width: 120px;"><strong>Layanan</strong></td>
                                <td>{{ $appointment->service->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Tanggal</strong></td>
                                <td>{{ $appointment->appointment_date->format('d F Y') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Waktu</strong></td>
                                <td>{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('H:i') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Status</strong></td>
                                <td>{!! $appointment->status_label !!}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-bold mb-3">Informasi Tambahan</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td style="width: 120px;"><strong>Dibuat</strong></td>
                                <td>{{ $appointment->created_at->format('d F Y, H:i') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Diperbarui</strong></td>
                                <td>{{ $appointment->updated_at->format('d F Y, H:i') }}</td>
                            </tr>
                            <tr>
                                <td><strong>ID</strong></td>
                                <td>#{{ $appointment->id }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <h6 class="fw-bold mb-3">Pesan dari Pelanggan</h6>
                        <div class="p-3 bg-light rounded">
                            @if($appointment->message)
                                {{ $appointment->message }}
                            @else
                                <span class="text-muted">Tidak ada pesan tambahan dari pelanggan.</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-4 col-lg-5 animate-fade-in">
        <div class="card card-custom mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Update Status</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.appointments.status', $appointment->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="status" class="form-label">Status Janji Temu</label>
                        <select class="form-select" id="status" name="status">
                            <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>Menunggu</option>
                            <option value="confirmed" {{ $appointment->status == 'confirmed' ? 'selected' : '' }}>Dikonfirmasi</option>
                            <option value="completed" {{ $appointment->status == 'completed' ? 'selected' : '' }}>Selesai</option>
                            <option value="cancelled" {{ $appointment->status == 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
                        </select>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Update Status</button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="card card-custom mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Aksi Cepat</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="mailto:{{ $appointment->email }}" class="btn btn-outline-primary">
                        <i class="fas fa-envelope me-2"></i> Email Pelanggan
                    </a>
                    <a href="tel:{{ $appointment->phone }}" class="btn btn-outline-primary">
                        <i class="fas fa-phone me-2"></i> Hubungi Pelanggan
                    </a>
                    <a href="{{ route('admin.appointments.edit', $appointment) }}" class="btn btn-outline-primary">
                        <i class="fas fa-edit me-2"></i> Edit Janji Temu
                    </a>
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        <i class="fas fa-trash me-2"></i> Hapus Janji Temu
                    </button>
                </div>
            </div>
        </div>
        
        <div class="card card-custom">
            <div class="card-header bg-white">
                <h5 class="mb-0">Layanan yang Dipilih</h5>
            </div>
            <div class="card-body">
                <div class="text-center mb-3">
                    <img src="{{ asset('storage/' . $appointment->service->image) }}" alt="{{ $appointment->service->name }}" class="img-fluid rounded" style="max-height: 150px;">
                </div>
                <h5 class="text-center mb-2">{{ $appointment->service->name }}</h5>
                <p class="text-center text-muted mb-3">{{ $appointment->service->short_description }}</p>
                <div class="d-flex justify-content-between mb-3">
                    <span>Harga Layanan:</span>
                    <span class="fw-bold">Rp {{ number_format($appointment->service->price, 0, ',', '.') }}</span>
                </div>
                <div class="d-grid">
                    <a href="{{ route('service.detail', $appointment->service->slug) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-external-link-alt me-1"></i> Lihat Detail Layanan
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus janji temu untuk <strong>{{ $appointment->name }}</strong> pada tanggal <strong>{{ $appointment->appointment_date->format('d F Y') }}</strong>?</p>
                <p class="text-danger"><small>Tindakan ini tidak dapat dibatalkan.</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form action="{{ route('admin.appointments.destroy', $appointment) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
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
    });
</script>
@endsection