@extends('layouts.app')

@section('title', 'Buat Janji - Bengkel Mobil Beteng Betawi')

@section('meta_description', 'Buat janji servis kendaraan Anda di Bengkel Mobil Beteng Betawi. Pilih waktu yang nyaman dan jenis layanan yang Anda butuhkan.')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-primary-800 text-white py-20">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="absolute inset-0 bg-[url('{{ asset('images/appointment-hero.jpg') }}')] bg-cover bg-center mix-blend-overlay"></div>
        
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-3xl">
                <h1 class="text-4xl md:text-5xl font-bold font-heading leading-tight mb-6">
                    Buat Janji Servis
                </h1>
                <p class="text-xl mb-6 text-gray-100">
                    Jadwalkan servis kendaraan Anda pada waktu yang tepat untuk Anda
                </p>
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ route('home') }}" class="text-gray-200 hover:text-white">
                                Beranda
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <i class="fas fa-chevron-right text-gray-300 mx-2 text-sm"></i>
                                <span class="text-gray-100">Buat Janji</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    
    <!-- Appointment Form Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <div class="lg:col-span-2">
                    <h2 class="text-3xl font-bold font-heading text-primary-800 mb-4">Jadwalkan Servis Kendaraan Anda</h2>
                    <div class="w-20 h-1 bg-secondary-600 mb-6"></div>
                    <p class="text-gray-700 mb-8">
                        Isi formulir di bawah ini untuk membuat janji servis. Tim kami akan mengkonfirmasi janji Anda melalui telepon atau email.
                    </p>
                    
                    <form action="{{ route('appointment.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="bg-gray-50 p-6 rounded-lg shadow-md mb-6">
                            <h3 class="text-xl font-semibold font-heading text-primary-800 mb-4">Informasi Pribadi</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label for="name" class="block text-gray-700 font-medium mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" required>
                                    @error('name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="email" class="block text-gray-700 font-medium mb-1">Email <span class="text-red-500">*</span></label>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" required>
                                    @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label for="phone" class="block text-gray-700 font-medium mb-1">Nomor Telepon <span class="text-red-500">*</span></label>
                                <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" required>
                                @error('phone')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="bg-gray-50 p-6 rounded-lg shadow-md mb-6">
                            <h3 class="text-xl font-semibold font-heading text-primary-800 mb-4">Informasi Kendaraan</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label for="car_model" class="block text-gray-700 font-medium mb-1">Merk & Model Mobil <span class="text-red-500">*</span></label>
                                    <input type="text" name="car_model" id="car_model" value="{{ old('car_model') }}" placeholder="Contoh: Toyota Avanza" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" required>
                                    @error('car_model')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="car_year" class="block text-gray-700 font-medium mb-1">Tahun Mobil <span class="text-red-500">*</span></label>
                                    <input type="number" name="car_year" id="car_year" value="{{ old('car_year') }}" min="1950" max="{{ date('Y') + 1 }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" required>
                                    @error('car_year')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label for="service_id" class="block text-gray-700 font-medium mb-1">Jenis Layanan <span class="text-red-500">*</span></label>
                                <select name="service_id" id="service_id" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" required>
                                    <option value="">Pilih Layanan</option>
                                    @foreach($services as $service)
                                    <option value="{{ $service->id }}" {{ old('service_id') == $service->id || request('service') == $service->slug ? 'selected' : '' }}>{{ $service->name }}</option>
                                    @endforeach
                                </select>
                                @error('service_id')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="bg-gray-50 p-6 rounded-lg shadow-md mb-6">
                            <h3 class="text-xl font-semibold font-heading text-primary-800 mb-4">Jadwal Servis</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label for="appointment_date" class="block text-gray-700 font-medium mb-1">Tanggal <span class="text-red-500">*</span></label>
                                    <input type="date" name="appointment_date" id="appointment_date" value="{{ old('appointment_date') }}" min="{{ date('Y-m-d') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" required>
                                    @error('appointment_date')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="appointment_time" class="block text-gray-700 font-medium mb-1">Waktu <span class="text-red-500">*</span></label>
                                    <select name="appointment_time" id="appointment_time" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" required>
                                        <option value="">Pilih Waktu</option>
                                        <option value="08:00" {{ old('appointment_time') == '08:00' ? 'selected' : '' }}>08:00</option>
                                        <option value="09:00" {{ old('appointment_time') == '09:00' ? 'selected' : '' }}>09:00</option>
                                        <option value="10:00" {{ old('appointment_time') == '10:00' ? 'selected' : '' }}>10:00</option>
                                        <option value="11:00" {{ old('appointment_time') == '11:00' ? 'selected' : '' }}>11:00</option>
                                        <option value="13:00" {{ old('appointment_time') == '13:00' ? 'selected' : '' }}>13:00</option>
                                        <option value="14:00" {{ old('appointment_time') == '14:00' ? 'selected' : '' }}>14:00</option>
                                        <option value="15:00" {{ old('appointment_time') == '15:00' ? 'selected' : '' }}>15:00</option>
                                    </select>
                                    @error('appointment_time')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label for="notes" class="block text-gray-700 font-medium mb-1">Keterangan Tambahan</label>
                                <textarea name="notes" id="notes" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">{{ old('notes') }}</textarea>
                                <p class="text-sm text-gray-500 mt-1">Tambahkan informasi atau keluhan khusus tentang kendaraan Anda</p>
                                @error('notes')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="text-right">
                            <button type="submit" class="inline-block bg-primary-600 hover:bg-primary-700 text-white font-medium px-6 py-3 rounded-md shadow transition duration-300">
                                Buat Janji Sekarang
                            </button>
                        </div>
                    </form>
                </div>
                
                <div class="lg:col-span-1">
                    <div class="bg-gray-50 p-6 rounded-lg shadow-md mb-6 sticky top-24">
                        <h3 class="text-xl font-semibold font-heading text-primary-800 mb-4">Informasi Kontak</h3>
                        <ul class="space-y-4 mb-6">
                            <li class="flex items-start">
                                <i class="fas fa-map-marker-alt mt-1 mr-3 text-secondary-600"></i>
                                <div>
                                    <span class="block font-medium text-gray-800">Alamat</span>
                                    <span class="text-gray-700">Jl. Raya Beteng Betawi No. 123, Jakarta Timur, DKI Jakarta 13760</span>
                                </div>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-phone-alt mt-1 mr-3 text-secondary-600"></i>
                                <div>
                                    <span class="block font-medium text-gray-800">Telepon</span>
                                    <span class="text-gray-700">(021) 1234-5678</span>
                                </div>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-envelope mt-1 mr-3 text-secondary-600"></i>
                                <div>
                                    <span class="block font-medium text-gray-800">Email</span>
                                    <span class="text-gray-700">info@bengkelbetengbetawi.com</span>
                                </div>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-clock mt-1 mr-3 text-secondary-600"></i>
                                <div>
                                    <span class="block font-medium text-gray-800">Jam Operasional</span>
                                    <span class="block text-gray-700">Senin - Jumat: 08:00 - 17:00</span>
                                    <span class="block text-gray-700">Sabtu: 08:00 - 15:00</span>
                                    <span class="block text-gray-700">Minggu: 09:00 - 14:00</span>
                                </div>
                            </li>
                        </ul>
                        
                        <div class="bg-primary-50 p-4 rounded-lg border border-primary-100">
                            <h4 class="font-semibold text-primary-800 mb-2">Catatan:</h4>
                            <ul class="space-y-2 text-gray-700 text-sm">
                                <li class="flex items-start">
                                    <i class="fas fa-info-circle mt-1 mr-2 text-primary-600"></i>
                                    <span>Pastikan data yang Anda isi benar dan lengkap</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-info-circle mt-1 mr-2 text-primary-600"></i>
                                    <span>Tim kami akan mengkonfirmasi janji Anda via telepon/SMS</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-info-circle mt-1 mr-2 text-primary-600"></i>
                                    <span>Harap datang 15 menit sebelum waktu janji</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-info-circle mt-1 mr-2 text-primary-600"></i>
                                    <span>Pembatalan janji harap dilakukan minimal 3 jam sebelumnya</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Why Make Appointment Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold font-heading text-primary-800 mb-4">Mengapa Membuat Janji?</h2>
                <div class="w-20 h-1 bg-secondary-600 mx-auto mb-6"></div>
                <p class="text-gray-700 max-w-2xl mx-auto">
                    Buat janji servis untuk mendapatkan pengalaman yang lebih baik dan efisien
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 text-center">
                    <div class="w-16 h-16 mx-auto bg-primary-600 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-clock text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold font-heading text-primary-800 mb-3">Hemat Waktu</h3>
                    <p class="text-gray-700">
                        Tidak perlu mengantri, kendaraan Anda akan langsung ditangani pada waktu yang telah ditentukan
                    </p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 text-center">
                    <div class="w-16 h-16 mx-auto bg-primary-600 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-user-check text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold font-heading text-primary-800 mb-3">Teknisi Tepat</h3>
                    <p class="text-gray-700">
                        Kami akan mempersiapkan teknisi dengan keahlian yang sesuai dengan kebutuhan kendaraan Anda
                    </p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 text-center">
                    <div class="w-16 h-16 mx-auto bg-primary-600 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-tools text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold font-heading text-primary-800 mb-3">Persiapan Sparepart</h3>
                    <p class="text-gray-700">
                        Kami dapat mempersiapkan suku cadang yang diperlukan sebelum Anda datang
                    </p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 text-center">
                    <div class="w-16 h-16 mx-auto bg-primary-600 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-calendar-check text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold font-heading text-primary-800 mb-3">Fleksibilitas</h3>
                    <p class="text-gray-700">
                        Pilih waktu yang paling nyaman untuk Anda sesuai dengan jadwal harian Anda
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- FAQ Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold font-heading text-primary-800 mb-4">Pertanyaan Umum</h2>
                <div class="w-20 h-1 bg-secondary-600 mx-auto mb-6"></div>
                <p class="text-gray-700 max-w-2xl mx-auto">
                    Jawaban untuk pertanyaan yang sering diajukan seputar pembuatan janji servis
                </p>
            </div>
            
            <div class="max-w-3xl mx-auto">
                <div class="space-y-4">
                    <div class="border border-gray-200 rounded-lg">
                        <button class="faq-question flex justify-between items-center w-full text-left p-4 focus:outline-none bg-white rounded-lg hover:bg-gray-50">
                            <span class="font-semibold text-primary-800">Bagaimana jika saya terlambat datang?</span>
                            <i class="fas fa-chevron-down text-primary-600 transform transition-transform duration-300"></i>
                        </button>
                        <div class="faq-answer hidden px-4 pb-4 text-gray-700">
                            <p>Jika Anda terlambat hingga 30 menit, kami masih akan mengupayakan untuk melayani Anda sesuai jadwal. Namun jika keterlambatan lebih dari 30 menit, kami mungkin perlu menjadwalkan ulang tergantung kepadatan bengkel. Harap hubungi kami jika Anda tahu akan terlambat.</p>
                        </div>
                    </div>
                    
                    <div class="border border-gray-200 rounded-lg">
                        <button class="faq-question flex justify-between items-center w-full text-left p-4 focus:outline-none bg-white rounded-lg hover:bg-gray-50">
                            <span class="font-semibold text-primary-800">Apakah saya bisa membatalkan atau mengubah jadwal janji?</span>
                            <i class="fas fa-chevron-down text-primary-600 transform transition-transform duration-300"></i>
                        </button>
                        <div class="faq-answer hidden px-4 pb-4 text-gray-700">
                            <p>Ya, Anda dapat membatalkan atau mengubah jadwal janji. Kami mohon informasi perubahan atau pembatalan dilakukan minimal 3 jam sebelum waktu janji yang telah ditetapkan. Hubungi kami melalui telepon atau WhatsApp untuk perubahan jadwal.</p>
                        </div>
                    </div>
                    
                    <div class="border border-gray-200 rounded-lg">
                        <button class="faq-question flex justify-between items-center w-full text-left p-4 focus:outline-none bg-white rounded-lg hover:bg-gray-50">
                            <span class="font-semibold text-primary-800">Apakah ada biaya untuk membuat janji?</span>
                            <i class="fas fa-chevron-down text-primary-600 transform transition-transform duration-300"></i>
                        </button>
                        <div class="faq-answer hidden px-4 pb-4 text-gray-700">
                            <p>Tidak, tidak ada biaya untuk membuat janji servis di bengkel kami. Anda hanya perlu membayar untuk layanan dan suku cadang yang digunakan dalam proses perbaikan atau perawatan kendaraan Anda.</p>
                        </div>
                    </div>
                    
                    <div class="border border-gray-200 rounded-lg">
                        <button class="faq-question flex justify-between items-center w-full text-left p-4 focus:outline-none bg-white rounded-lg hover:bg-gray-50">
                            <span class="font-semibold text-primary-800">Berapa lama waktu yang diperlukan untuk servis?</span>
                            <i class="fas fa-chevron-down text-primary-600 transform transition-transform duration-300"></i>
                        </button>
                        <div class="faq-answer hidden px-4 pb-4 text-gray-700">
                            <p>Waktu servis bervariasi tergantung jenis layanan. Servis ringan seperti ganti oli membutuhkan waktu sekitar 30-60 menit, tune up sekitar 1-2 jam, dan perbaikan yang lebih kompleks seperti overhaul mesin bisa memakan waktu beberapa hari. Teknisi kami akan memberikan estimasi waktu yang lebih akurat setelah memeriksa kendaraan Anda.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // FAQ Accordion
        const faqQuestions = document.querySelectorAll('.faq-question');
        
        faqQuestions.forEach(question => {
            question.addEventListener('click', function() {
                const answer = this.nextElementSibling;
                const chevron = this.querySelector('i');
                
                // Toggle answer
                answer.classList.toggle('hidden');
                
                // Rotate chevron
                chevron.classList.toggle('rotate-180');
                
                // Close other open FAQs
                faqQuestions.forEach(otherQuestion => {
                    if (otherQuestion !== question) {
                        const otherAnswer = otherQuestion.nextElementSibling;
                        const otherChevron = otherQuestion.querySelector('i');
                        
                        otherAnswer.classList.add('hidden');
                        otherChevron.classList.remove('rotate-180');
                    }
                });
            });
        });
        
        // Date Input Min Date
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('appointment_date').setAttribute('min', today);
    });
</script>
@endpush