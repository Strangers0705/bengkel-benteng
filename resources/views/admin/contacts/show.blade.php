@extends('layouts.admin')

@section('title', 'Detail Pesan Kontak')

@section('page-title', 'Detail Pesan Kontak')

@section('content')
<div class="row animate-fade-in">
    <div class="col-lg-8 mx-auto">
        <div class="card card-custom">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Detail Pesan</h5>
                    <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <h4 class="mb-1">{{ $contact->subject }}</h4>
                    <div class="text-muted small">
                        <span class="me-3"><i class="far fa-calendar me-1"></i> {{ $contact->created_at->format('d F Y, H:i') }}</span>
                        <span class="me-3"><i class="far fa-user me-1"></i> {{ $contact->name }}</span>
                        <span><i class="far fa-envelope me-1"></i> {{ $contact->email }}</span>
                    </div>
                </div>
                
                <div class="mb-4">
                    <div class="p-3 bg-light rounded">
                        <p class="mb-0">{{ $contact->message }}</p>
                    </div>
                </div>
                
                <div class="d-flex justify-content-between align-items-center border-top pt-3">
                    <div>
                        <span class="text-muted me-3">
                            <i class="fas fa-phone me-1"></i> {{ $contact->phone }}
                        </span>
                        <span class="text-muted">
                            <i class="fas fa-envelope me-1"></i> {{ $contact->email }}
                        </span>
                    </div>
                    <div>
                        @if(!$contact->is_read)
                        <form action="{{ route('admin.contacts.mark-read', $contact) }}" method="POST" class="d-inline-block me-1">
                            @csrf
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-check me-1"></i> Tandai Dibaca
                            </button>
                        </form>
                        @endif
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <i class="fas fa-trash me-1"></i> Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card card-custom mt-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Aksi Cepat</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <div class="d-grid">
                            <a href="mailto:{{ $contact->email }}" class="btn btn-primary">
                                <i class="fas fa-reply me-2"></i> Balas via Email
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-grid">
                            <a href="tel:{{ $contact->phone }}" class="btn btn-outline-primary">
                                <i class="fas fa-phone me-2"></i> Hubungi via Telepon
                            </a>
                        </div>
                    </div>
                </div>
                
                @if(session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
                @endif
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
                <p>Apakah Anda yakin ingin menghapus pesan dari <strong>{{ $contact->name }}</strong>?</p>
                <p class="text-danger"><small>Tindakan ini tidak dapat dibatalkan.</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST">
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