@extends('layouts.admin')

@section('title', 'Kelola Galeri')

@section('page-title', 'Kelola Galeri')

@section('content')
<div class="row mb-4 animate-fade-in">
    <div class="col-md-12">
        <div class="card card-custom">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Daftar Galeri</h5>
                    <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle me-1"></i> Tambah Foto
                    </a>
                </div>
            </div>
            <div class="card-body">
                <!-- Filter -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <form action="{{ route('admin.gallery.index') }}" method="GET" class="row g-3">
                            <div class="col-md-4">
                                <label for="category" class="form-label">Filter Kategori</label>
                                <select class="form-select" id="category" name="category">
                                    <option value="">Semua Kategori</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="status" class="form-label">Filter Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="">Semua Status</option>
                                    <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Nonaktif</option>
                                </select>
                            </div>
                            <div class="col-md-4 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary me-2">
                                    <i class="fas fa-filter me-1"></i> Filter
                                </button>
                                <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-redo me-1"></i> Reset
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Gallery Grid -->
                <div class="row">
                    @forelse($galleryItems as $item)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="position-relative">
                                <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->title }}" style="height: 200px; object-fit: cover;">
                                <span class="position-absolute top-0 start-0 badge {{ $item->is_active ? 'bg-success' : 'bg-secondary' }} m-2">
                                    {{ $item->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                                <div class="position-absolute top-0 end-0 m-2">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('admin.gallery.edit', $item) }}">
                                                    <i class="fas fa-edit me-2"></i> Edit
                                                </a>
                                            </li>
                                            <li>
                                                <button class="dropdown-item text-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}">
                                                    <i class="fas fa-trash me-2"></i> Hapus
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->title }}</h5>
                                <p class="card-text text-muted small">{{ Str::limit($item->description, 80) }}</p>
                                <span class="badge bg-primary">{{ $item->category }}</span>
                            </div>
                            <div class="card-footer bg-white d-flex justify-content-between align-items-center">
                                <small class="text-muted">Ditambahkan: {{ $item->created_at->format('d/m/Y') }}</small>
                                <div>
                                    <a href="{{ route('admin.gallery.edit', $item) }}" class="btn btn-sm btn-primary me-1">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel{{ $item->id }}">Konfirmasi Hapus</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="text-center mb-3">
                                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="img-fluid rounded" style="max-height: 200px;">
                                        </div>
                                        <p>Apakah Anda yakin ingin menghapus foto <strong>{{ $item->title }}</strong>?</p>
                                        <p class="text-danger"><small>Tindakan ini tidak dapat dibatalkan.</small></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <form action="{{ route('admin.gallery.destroy', $item) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center py-5">
                        <img src="https://cdn-icons-png.flaticon.com/512/3588/3588294.png" alt="No Gallery Items" style="width: 150px; opacity: 0.5;">
                        <p class="text-muted mt-3">Belum ada foto dalam galeri</p>
                        <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary mt-2">
                            <i class="fas fa-plus-circle me-1"></i> Tambah Foto
                        </a>
                    </div>
                    @endforelse
                </div>
                
                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $galleryItems->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Category Management Card -->
<div class="row animate-fade-in">
    <div class="col-md-12">
        <div class="card card-custom">
            <div class="card-header bg-white">
                <h5 class="mb-0">Kategori Galeri</h5>
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    <div class="d-flex">
                        <div class="me-3">
                            <i class="fas fa-info-circle fa-2x"></i>
                        </div>
                        <div>
                            <h5>Pengelolaan Kategori Galeri:</h5>
                            <p class="mb-0">Kategori galeri akan ditambahkan secara otomatis saat Anda menambahkan foto baru dengan kategori yang belum ada. Untuk mengubah kategori, Anda dapat mengedit foto dan mengubah kategorinya.</p>
                        </div>
                    </div>
                </div>
                
                <div class="mt-3">
                    <h6 class="mb-3">Kategori yang Tersedia:</h6>
                    <div class="d-flex flex-wrap gap-2">
                        @forelse($categories as $category)
                            <span class="badge bg-primary p-2">{{ $category }}</span>
                        @empty
                            <p class="text-muted">Belum ada kategori</p>
                        @endforelse
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
        
        // Auto-submit filter form when status or category changes
        const statusFilter = document.getElementById('status');
        const categoryFilter = document.getElementById('category');
        
        if (statusFilter) {
            statusFilter.addEventListener('change', function() {
                this.form.submit();
            });
        }
        
        if (categoryFilter) {
            categoryFilter.addEventListener('change', function() {
                this.form.submit();
            });
        }
    });
</script>
@endsection