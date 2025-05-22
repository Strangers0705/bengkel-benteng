@extends('layouts.admin')

@section('title', 'Tambah Testimonial')

@section('page-title', 'Tambah Testimonial')

@section('content')
<div class="row animate-fade-in">
    <div class="col-lg-12">
        <div class="card card-custom">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Tambah Testimonial Baru</h5>
                    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data" class="form-custom">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="position" class="form-label">Posisi / Pekerjaan</label>
                                <input type="text" class="form-control @error('position') is-invalid @enderror" id="position" name="position" value="{{ old('position') }}">
                                @error('position')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="content" class="form-label">Isi Testimonial <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="5" required>{{ old('content') }}</textarea>
                                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="rating" class="form-label">Rating <span class="text-danger">*</span></label>
                                <div class="rating-input @error('rating') is-invalid @enderror">
                                    <div class="d-flex justify-content-between mb-2">
                                        @for($i = 1; $i <= 5; $i++)
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="rating" id="rating{{ $i }}" value="{{ $i }}" {{ old('rating') == $i ? 'checked' : '' }} {{ !old('rating') && $i == 5 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="rating{{ $i }}">{{ $i }}</label>
                                            </div>
                                        @endfor
                                    </div>
                                    <div class="text-warning fs-3 text-center">
                                        <i class="far fa-star star-rating" data-rating="1"></i>
                                        <i class="far fa-star star-rating" data-rating="2"></i>
                                        <i class="far fa-star star-rating" data-rating="3"></i>
                                        <i class="far fa-star star-rating" data-rating="4"></i>
                                        <i class="far fa-star star-rating" data-rating="5"></i>
                                    </div>
                                </div>
                                @error('rating')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="image" class="form-label">Foto</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                                <small class="text-muted">Format: JPG, PNG, GIF. Max: 2MB</small>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <div id="imagePreviewContainer" class="d-none mt-2">
                                    <img id="imagePreview" src="#" alt="Preview" class="img-thumbnail rounded-circle mx-auto d-block" style="width: 150px; height: 150px; object-fit: cover;">
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', '1') == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">Testimonial Aktif</label>
                                </div>
                                <small class="text-muted">Testimonial yang aktif akan ditampilkan di website</small>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <div class="d-flex justify-content-end mt-3">
                                <button type="reset" class="btn btn-secondary me-2">Reset</button>
                                <button type="submit" class="btn btn-primary">Simpan Testimonial</button>
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
            }
        });
        
        // Star rating visualization
        const ratingInputs = document.querySelectorAll('input[name="rating"]');
        const starRatings = document.querySelectorAll('.star-rating');
        
        // Initialize stars based on default/selected rating
        updateStars();
        
        ratingInputs.forEach(input => {
            input.addEventListener('change', updateStars);
        });
        
        function updateStars() {
            let selectedRating = 5; // Default
            
            ratingInputs.forEach(input => {
                if (input.checked) {
                    selectedRating = parseInt(input.value);
                }
            });
            
            starRatings.forEach((star, index) => {
                if (index < selectedRating) {
                    star.classList.remove('far');
                    star.classList.add('fas');
                } else {
                    star.classList.remove('fas');
                    star.classList.add('far');
                }
            });
        }
        
        // Allow clicking on stars to set rating
        starRatings.forEach(star => {
            star.addEventListener('click', function() {
                const rating = this.getAttribute('data-rating');
                document.getElementById('rating' + rating).checked = true;
                updateStars();
            });
        });
    });
</script>
@endsection