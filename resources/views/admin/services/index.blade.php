@extends('layouts.admin')

@section('title', 'Kelola Layanan')

@section('page-title', 'Kelola Layanan')

@section('content')
<div class="row mb-4 animate-fade-in">
    <div class="col-md-12">
        <div class="card card-custom">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Daftar Layanan</h5>
                    <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle me-1"></i> Tambah Layanan
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-custom">
                        <thead>
                            <tr>
                                <th style="width: 50px;">ID</th>
                                <th style="width: 100px;">Gambar</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Urutan</th>
                                <th>Status</th>
                                <th style="width: 150px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="sortable-services">
                            @forelse($services as $service)
                            <tr>
                                <td>{{ $service->id }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" class="img-fluid rounded" style="width: 80px; height: 60px; object-fit: cover;">
                                </td>
                                <td>
                                    <div class="fw-bold">{{ $service->name }}</div>
                                    <div class="small text-muted">{{ Str::limit($service->short_description, 50) }}</div>
                                </td>
                                <td>Rp {{ number_format($service->price, 0, ',', '.') }}</td>
                                <td>{{ $service->order }}</td>
                                <td>
                                    @if($service->is_featured)
                                        <span class="badge bg-success">Featured</span>
                                    @else
                                        <span class="badge bg-secondary">Regular</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('service.detail', $service->slug) }}" target="_blank" class="btn btn-sm btn-info me-1" title="Lihat">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-sm btn-primary me-1" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger" title="Hapus" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $service->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    
                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal{{ $service->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $service->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $service->id }}">Konfirmasi Hapus</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah Anda yakin ingin menghapus layanan <strong>{{ $service->name }}</strong>?</p>
                                                    <p class="text-danger"><small>Tindakan ini tidak dapat dibatalkan dan akan menghapus semua janji temu terkait dengan layanan ini.</small></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('admin.services.destroy', $service) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    <img src="https://cdn-icons-png.flaticon.com/512/5445/5445197.png" alt="No Services" style="width: 100px; opacity: 0.5;">
                                    <p class="text-muted mt-3">Belum ada layanan yang tersedia</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Reordering Information Card -->
<div class="row">
    <div class="col-md-12 animate-fade-in">
        <div class="card card-custom">
            <div class="card-header bg-white">
                <h5 class="mb-0">Mengatur Urutan Layanan</h5>
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    <div class="d-flex">
                        <div class="me-3">
                            <i class="fas fa-info-circle fa-2x"></i>
                        </div>
                        <div>
                            <h5>Cara Mengatur Urutan Layanan:</h5>
                            <ol class="mb-0">
                                <li>Anda dapat mengatur urutan layanan melalui halaman edit setiap layanan</li>
                                <li>Masukkan nomor urutan pada field "Urutan" (semakin kecil angka, semakin di atas posisinya)</li>
                                <li>Layanan yang ditandai sebagai "Featured" akan muncul di halaman beranda</li>
                                <li>Perubahan urutan akan otomatis terupdate di tampilan frontend</li>
                            </ol>
                        </div>
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