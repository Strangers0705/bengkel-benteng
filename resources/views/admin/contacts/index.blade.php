@extends('layouts.admin')

@section('title', 'Kelola Pesan Kontak')

@section('page-title', 'Kelola Pesan Kontak')

@section('content')
<div class="row mb-4 animate-fade-in">
    <div class="col-md-12">
        <div class="card card-custom">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Daftar Pesan Kontak</h5>
                    <div>
                        <button id="markAllReadBtn" class="btn btn-outline-primary me-2">
                            <i class="fas fa-check-double me-1"></i> Tandai Semua Dibaca
                        </button>
                        <a href="{{ route('contact') }}" target="_blank" class="btn btn-primary">
                            <i class="fas fa-external-link-alt me-1"></i> Form Kontak
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!-- Filter -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <form action="{{ route('admin.contacts.index') }}" method="GET" class="row g-3">
                            <div class="col-md-4">
                                <label for="status" class="form-label">Filter Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="">Semua Status</option>
                                    <option value="unread" {{ request('status') == 'unread' ? 'selected' : '' }}>Belum Dibaca</option>
                                    <option value="read" {{ request('status') == 'read' ? 'selected' : '' }}>Sudah Dibaca</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="search" class="form-label">Pencarian</label>
                                <input type="text" class="form-control" id="search" name="search" value="{{ request('search') }}" placeholder="Cari nama, email, subjek...">
                            </div>
                            <div class="col-md-4 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary me-2">
                                    <i class="fas fa-filter me-1"></i> Filter
                                </button>
                                <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-redo me-1"></i> Reset
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Messages List -->
                <div class="table-responsive">
                    <table class="table table-hover table-custom">
                        <thead>
                            <tr>
                                <th style="width: 20px;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="selectAll">
                                    </div>
                                </th>
                                <th style="width: 50px;">Status</th>
                                <th>Pengirim</th>
                                <th>Subjek</th>
                                <th>Tanggal</th>
                                <th style="width: 130px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($contacts as $contact)
                            <tr class="{{ $contact->is_read ? '' : 'fw-bold table-light' }}">
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input message-checkbox" type="checkbox" value="{{ $contact->id }}">
                                    </div>
                                </td>
                                <td>
                                    @if($contact->is_read)
                                        <span class="badge bg-secondary">Dibaca</span>
                                    @else
                                        <span class="badge bg-danger">Baru</span>
                                    @endif
                                </td>
                                <td>
                                    <div>{{ $contact->name }}</div>
                                    <div class="small text-muted">{{ $contact->email }}</div>
                                </td>
                                <td>
                                    {{ Str::limit($contact->subject, 50) }}
                                </td>
                                <td>
                                    {{ $contact->created_at->format('d/m/Y H:i') }}
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-sm btn-info me-1" title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @if(!$contact->is_read)
                                        <form action="{{ route('admin.contacts.mark-read', $contact) }}" method="POST" class="me-1">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success" title="Tandai Dibaca">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </form>
                                        @endif
                                        <button type="button" class="btn btn-sm btn-danger" title="Hapus" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $contact->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    
                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal{{ $contact->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $contact->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $contact->id }}">Konfirmasi Hapus</h5>
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
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <img src="https://cdn-icons-png.flaticon.com/512/2899/2899298.png" alt="No Messages" style="width: 100px; opacity: 0.5;">
                                    <p class="text-muted mt-3">Tidak ada pesan yang ditemukan</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $contacts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bulk Actions Form -->
<form id="bulkActionForm" action="{{ route('admin.contacts.bulk-action') }}" method="POST" class="d-none">
    @csrf
    <input type="hidden" name="action" id="bulkAction">
    <input type="hidden" name="ids" id="selectedIds">
</form>
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
        
        // Auto-submit filter form when status changes
        const statusFilter = document.getElementById('status');
        
        if (statusFilter) {
            statusFilter.addEventListener('change', function() {
                this.form.submit();
            });
        }
        
        // Select all checkbox
        const selectAll = document.getElementById('selectAll');
        const checkboxes = document.querySelectorAll('.message-checkbox');
        
        if (selectAll) {
            selectAll.addEventListener('change', function() {
                checkboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
            });
        }
        
        // Mark all as read button
        const markAllReadBtn = document.getElementById('markAllReadBtn');
        const bulkActionForm = document.getElementById('bulkActionForm');
        const bulkAction = document.getElementById('bulkAction');
        const selectedIds = document.getElementById('selectedIds');
        
        if (markAllReadBtn && bulkActionForm) {
            markAllReadBtn.addEventListener('click', function() {
                const selected = [];
                
                checkboxes.forEach(checkbox => {
                    if (checkbox.checked) {
                        selected.push(checkbox.value);
                    }
                });
                
                if (selected.length === 0) {
                    alert('Pilih setidaknya satu pesan untuk ditandai dibaca.');
                    return;
                }
                
                bulkAction.value = 'mark-read';
                selectedIds.value = selected.join(',');
                bulkActionForm.submit();
            });
        }
    });
</script>
@endsection