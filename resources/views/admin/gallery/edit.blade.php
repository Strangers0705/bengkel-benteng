@extends('layouts.admin')

@section('title', 'Edit Foto Galeri')

@section('page-title', 'Edit Foto Galeri')

@section('content')
<div class="row animate-fade-in">
    <div class="col-lg-12">
        <div class="card card-custom">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Foto Galeri</h5>
                    <a href="{{ route('admin.gallery.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.gallery.update', $gallery) }}" method="POST" enctype="multipart/form-data" class="form-custom">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-7">
                            <div class="mb-3">
                                <label for="title" class="form-label">Judul Foto <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $gallery->title) }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description', $gallery->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="category" class="form-label">Kategori <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <select class="form-select @error('category') is-invalid @enderror" id="category" name="category" required>
                                        <option value="" disabled>Pilih Kategori</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category }}" {{ old('category', $gallery->category) == $category ? 'selected' : '' }}>{{ $category }}</option>
                                        @endforeach
                                        <option value="new">+ Kategori Baru</option>
                                    </select>
                                </div>
                                @error('category')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div id="newCategoryGroup" class="mb-3 d-none">
                                <label for="new_category" class="form-label">Nama Kategori Baru <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="new_category" name="new_category" value="{{ old('new_category') }}">
                                <small class="text-muted">Masukkan nama kategori baru</small>
                            </div>
                            
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $gallery->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">Aktif</label>
                                </div>
                                <small class="text-muted">Foto yang aktif akan ditampilkan di website</small>
                            </div>
                        </div>
                        
                        <div class="col-md-5">
                            <div class="mb-3">
                                <label for="image" class="form-label">Ubah Foto</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                                <small class="text-muted">Format: JPG, PNG, GIF. Max: 2MB. Biarkan kosong jika tidak ingin mengubah foto.</small>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <div class="card">
                                    <div class="card-header bg-light">
                                        <h6 class="mb-0">Foto Saat Ini</h6>
                                    </div>
                                    <div class="card-body p-2 text-center">
                                        <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" class="img-fluid rounded" style="max-height: 300px;">
                                    </div>
                                </div>
                                
                                <div id="imagePreviewContainer" class="d-none mt-3">
                                    <div class="card">
                                        <div class="card-header bg-light">
                                            <h6 class="mb-0">Foto Baru</h6>
                                        </div>
                                        <div class="card-body p-2 text-center">
                                            <img id="imagePreview" src="#" alt="Preview" class="img-fluid rounded" style="max-height: 300px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <div class="d-flex justify-content-end mt-3">
                                <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary me-2">Batal</a>
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
        
        // Image preview
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('imagePreview');
        const imagePreviewContainer = document.getElementById('imagePreviewContainer');
        
        imageInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreviewContainer.classList.remove('d-none');
                }
                
                reader.readAsDataURL(this.files[0]);
            } else {
                imagePreviewContainer.classList.add('d-none');
            }
        });
        
        // New category handling
        const categorySelect = document.getElementById('category');
        const newCategoryGroup = document.getElementById('newCategoryGroup');
        const newCategoryInput = document.getElementById('new_category');
        
        categorySelect.addEventListener('change', function() {
            if (this.value === 'new') {
                newCategoryGroup.classList.remove('d-none');
                newCategoryInput.setAttribute('required', '');
            } else {
                newCategoryGroup.classList.add('d-none');
                newCategoryInput.removeAttribute('required');
            }
        });
        
        // Initialize if 'new' is selected on page load (e.g., due to validation error)
        if (categorySelect.value === 'new') {
            newCategoryGroup.classList.remove('d-none');
            newCategoryInput.setAttribute('required', '');
        }
    });
</script>
@endsection