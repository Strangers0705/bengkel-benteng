@extends('layouts.app')

@section('title', 'Kontak Kami - Bengkel Mobil Beteng Betawi')

@section('meta_description', 'Hubungi Bengkel Mobil Beteng Betawi untuk pertanyaan, janji servis, atau konsultasi perbaikan kendaraan Anda. Kami siap membantu Anda.')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-primary-800 text-white py-20">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="absolute inset-0 bg-[url('{{ asset('images/contact-hero.jpg') }}')] bg-cover bg-center mix-blend-overlay"></div>
        
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-3xl">
                <h1 class="text-4xl md:text-5xl font-bold font-heading leading-tight mb-6">
                    Hubungi Kami
                </h1>
                <p class="text-xl mb-6 text-gray-100">
                    Kami siap membantu Anda dengan pertanyaan atau kebutuhan servis kendaraan
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
                                <span class="text-gray-100">Kontak</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    
    <!-- Contact Info Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-50 p-8 rounded-lg shadow-md text-center hover:shadow-lg transition duration-300">
                    <div class="w-16 h-16 bg-primary-600 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-map-marker-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold font-heading text-primary-800 mb-3">Alamat Kami</h3>
                    <p class="text-gray-700">
                        Jl. Raya Beteng Betawi No. 123<br>
                        Jakarta Timur<br>
                        DKI Jakarta 13760
                    </p>
                </div>
                
                <div class="bg-gray-50 p-8 rounded-lg shadow-md text-center hover:shadow-lg transition duration-300">
                    <div class="w-16 h-16 bg-primary-600 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-phone-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold font-heading text-primary-800 mb-3">Telepon & WhatsApp</h3>
                    <p class="text-gray-700 mb-2">
                        Telepon: (021) 1234-5678
                    </p>
                    <p class="text-gray-700">
                        WhatsApp: 0812-3456-7890
                    </p>
                    <a href="https://wa.me/6281234567890" class="inline-block mt-4 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded transition duration-300">
                        <i class="fab fa-whatsapp mr-2"></i> Chat WhatsApp
                    </a>
                </div>
                
                <div class="bg-gray-50 p-8 rounded-lg shadow-md text-center hover:shadow-lg transition duration-300">
                    <div class="w-16 h-16 bg-primary-600 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-clock text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold font-heading text-primary-800 mb-3">Jam Operasional</h3>
                    <div class="text-gray-700">
                        <p class="mb-1">Senin - Jumat: 08:00 - 17:00</p>
                        <p class="mb-1">Sabtu: 08:00 - 15:00</p>
                        <p>Minggu: 09:00 - 14:00</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Map & Contact Form Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div>
                    <h2 class="text-3xl font-bold font-heading text-primary-800 mb-4">Lokasi Kami</h2>
                    <div class="w-20 h-1 bg-secondary-600 mb-6"></div>
                    <p class="text-gray-700 mb-6">
                        Bengkel kami terletak di lokasi strategis dan mudah diakses dari berbagai wilayah Jakarta. Kunjungi kami atau buat janji terlebih dahulu untuk layanan yang lebih cepat.
                    </p>
                    
                    <div class="bg-white p-1 rounded-lg shadow-md h-[400px] mb-6">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253840.65295200603!2d106.68942953809738!3d-6.229386705474286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x5371bf0fdad786a2!2sJakarta%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sid!2sid!4v1617974363786!5m2!1sid!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-xl font-semibold font-heading text-primary-800 mb-3">Arah Menuju Bengkel</h3>
                        <p class="text-gray-700 mb-4">
                            Bengkel kami mudah diakses dari:
                        </p>
                        <ul class="space-y-2 text-gray-700">
                            <li class="flex items-start">
                                <i class="fas fa-chevron-right text-secondary-600 mt-1 mr-2"></i>
                                <span>5 menit dari Stasiun Kereta Jatinegara</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-chevron-right text-secondary-600 mt-1 mr-2"></i>
                                <span>10 menit dari Pintu Tol Cawang</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-chevron-right text-secondary-600 mt-1 mr-2"></i>
                                <span>15 menit dari Pusat Perbelanjaan Kalibata</span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div>
                    <h2 class="text-3xl font-bold font-heading text-primary-800 mb-4">Kirim Pesan</h2>
                    <div class="w-20 h-1 bg-secondary-600 mb-6"></div>
                    <p class="text-gray-700 mb-6">
                        Ada pertanyaan atau kebutuhan khusus? Jangan ragu untuk menghubungi kami melalui formulir di bawah ini dan tim kami akan segera merespons.
                    </p>
                    
                    @if(session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                        <p>{{ session('success') }}</p>
                    </div>
                    @endif
                    
                    <form action="{{ route('contact.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="name" class="block text-gray-700 font-medium mb-1">Nama Lengkap</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" required>
                                @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" required>
                                @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="phone" class="block text-gray-700 font-medium mb-1">Nomor Telepon</label>
                                <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" required>
                                @error('phone')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="subject" class="block text-gray-700 font-medium mb-1">Subjek</label>
                                <input type="text" name="subject" id="subject" value="{{ old('subject') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" required>
                                @error('subject')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="message" class="block text-gray-700 font-medium mb-1">Pesan</label>
                            <textarea name="message" id="message" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" required>{{ old('message') }}</textarea>
                            @error('message')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="text-right">
                            <button type="submit" class="inline-block bg-primary-600 hover:bg-primary-700 text-white font-medium px-6 py-3 rounded-md transition duration-300">
                                Kirim Pesan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Social Media Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold font-heading text-primary-800 mb-4">Ikuti Kami</h2>
                <div class="w-20 h-1 bg-secondary-600 mx-auto mb-6"></div>
                <p class="text-gray-700 max-w-2xl mx-auto">
                    Ikuti kami di media sosial untuk mendapatkan informasi terbaru tentang promo, tips perawatan kendaraan, dan berbagai konten menarik lainnya
                </p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                <a href="https://facebook.com/bengkelbetengbetawi" class="bg-gray-50 p-6 rounded-lg shadow-md text-center hover:shadow-lg transition duration-300 group">
                    <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mb-4 mx-auto group-hover:scale-110 transition duration-300">
                        <i class="fab fa-facebook-f text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold font-heading text-primary-800 mb-1">Facebook</h3>
                    <p class="text-gray-700">@bengkelbetengbetawi</p>
                </a>
                
                <a href="https://instagram.com/bengkelbetengbetawi" class="bg-gray-50 p-6 rounded-lg shadow-md text-center hover:shadow-lg transition duration-300 group">
                    <div class="w-16 h-16 bg-gradient-to-r from-pink-500 via-red-500 to-yellow-500 rounded-full flex items-center justify-center mb-4 mx-auto group-hover:scale-110 transition duration-300">
                        <i class="fab fa-instagram text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold font-heading text-primary-800 mb-1">Instagram</h3>
                    <p class="text-gray-700">@bengkelbetengbetawi</p>
                </a>
                
                <a href="https://youtube.com/bengkelbetengbetawi" class="bg-gray-50 p-6 rounded-lg shadow-md text-center hover:shadow-lg transition duration-300 group">
                    <div class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center mb-4 mx-auto group-hover:scale-110 transition duration-300">
                        <i class="fab fa-youtube text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold font-heading text-primary-800 mb-1">YouTube</h3>
                    <p class="text-gray-700">Bengkel Beteng Betawi</p>
                </a>
                
                <a href="https://tiktok.com/@bengkelbetengbetawi" class="bg-gray-50 p-6 rounded-lg shadow-md text-center hover:shadow-lg transition duration-300 group">
                    <div class="w-16 h-16 bg-black rounded-full flex items-center justify-center mb-4 mx-auto group-hover:scale-110 transition duration-300">
                        <i class="fab fa-tiktok text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold font-heading text-primary-800 mb-1">TikTok</h3>
                    <p class="text-gray-700">@bengkelbetengbetawi</p>
                </a>
            </div>
        </div>
    </section>
    
    <!-- FAQ Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold font-heading text-primary-800 mb-4">Pertanyaan Umum</h2>
                <div class="w-20 h-1 bg-secondary-600 mx-auto mb-6"></div>
                <p class="text-gray-700 max-w-2xl mx-auto">
                    Berikut adalah jawaban untuk pertanyaan yang sering diajukan
                </p>
            </div>
            
            <div class="max-w-3xl mx-auto">
                <div class="space-y-4">
                    <div class="border border-gray-200 rounded-lg">
                        <button class="faq-question flex justify-between items-center w-full text-left p-4 focus:outline-none bg-white rounded-lg hover:bg-gray-50">
                            <span class="font-semibold text-primary-800">Apakah saya harus membuat janji terlebih dahulu?</span>
                            <i class="fas fa-chevron-down text-primary-600 transform transition-transform duration-300"></i>
                        </button>
                        <div class="faq-answer hidden px-4 pb-4 text-gray-700">
                            <p>Kami menyarankan untuk membuat janji terlebih dahulu agar kami dapat mengalokasikan waktu khusus untuk kendaraan Anda dan memastikan teknisi yang tepat tersedia. Namun, kami juga menerima pelanggan yang datang langsung tanpa janji, dengan catatan mungkin perlu menunggu jika bengkel sedang ramai.</p>
                        </div>
                    </div>
                    
                    <div class="border border-gray-200 rounded-lg">
                        <button class="faq-question flex justify-between items-center w-full text-left p-4 focus:outline-none bg-white rounded-lg hover:bg-gray-50">
                            <span class="font-semibold text-primary-800">Apakah saya perlu menunggu selama servis?</span>
                            <i class="fas fa-chevron-down text-primary-600 transform transition-transform duration-300"></i>
                        </button>
                        <div class="faq-answer hidden px-4 pb-4 text-gray-700">
                            <p>Anda dapat menunggu di ruang tunggu kami yang nyaman dengan WiFi gratis dan minuman, atau Anda dapat meninggalkan kendaraan dan kembali saat pekerjaan selesai. Untuk servis besar yang memerlukan waktu lebih lama, kami menyarankan untuk tidak menunggu.</p>
                        </div>
                    </div>
                    
                    <div class="border border-gray-200 rounded-lg">
                        <button class="faq-question flex justify-between items-center w-full text-left p-4 focus:outline-none bg-white rounded-lg hover:bg-gray-50">
                            <span class="font-semibold text-primary-800">Bagaimana sistem pembayaran di bengkel Anda?</span>
                            <i class="fas fa-chevron-down text-primary-600 transform transition-transform duration-300"></i>
                        </button>
                        <div class="faq-answer hidden px-4 pb-4 text-gray-700">
                            <p>Kami menerima berbagai metode pembayaran termasuk tunai, kartu debit/kredit, transfer bank, dan e-wallet (GoPay, OVO, DANA, ShopeePay). Untuk servis besar, kami mungkin meminta uang muka sebagai konfirmasi pemesanan.</p>
                        </div>
                    </div>
                    
                    <div class="border border-gray-200 rounded-lg">
                        <button class="faq-question flex justify-between items-center w-full text-left p-4 focus:outline-none bg-white rounded-lg hover:bg-gray-50">
                            <span class="font-semibold text-primary-800">Apakah Anda menyediakan layanan antar-jemput kendaraan?</span>
                            <i class="fas fa-chevron-down text-primary-600 transform transition-transform duration-300"></i>
                        </button>
                        <div class="faq-answer hidden px-4 pb-4 text-gray-700">
                            <p>Ya, kami menyediakan layanan antar-jemput kendaraan dengan biaya tambahan tergantung jarak lokasi Anda. Layanan ini perlu dipesan minimal 1 hari sebelumnya. Hubungi kami untuk informasi lebih lanjut.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="py-16 bg-primary-800 text-white relative">
        <div class="absolute inset-0 bg-black opacity-40"></div>
        <div class="absolute inset-0 bg-[url('{{ asset('images/cta-bg.jpg') }}')] bg-cover bg-center mix-blend-overlay"></div>
        
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl font-bold font-heading mb-6">Jadwalkan Servis Kendaraan Anda</h2>
                <p class="text-xl mb-8 text-gray-100">
                    Percayakan kendaraan Anda pada ahlinya. Buat janji servis sekarang!
                </p>
                <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="{{ route('appointment') }}" class="inline-block bg-secondary-600 hover:bg-secondary-700 text-white font-medium px-6 py-3 rounded-md shadow-lg transition duration-300 text-center">
                        Buat Janji Sekarang
                    </a>
                    <a href="tel:+6281234567890" class="inline-block bg-white hover:bg-gray-100 text-primary-800 font-medium px-6 py-3 rounded-md shadow-lg transition duration-300 text-center">
                        <i class="fas fa-phone-alt mr-2"></i> Hubungi Kami
                    </a>
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
    });
</script>
@endpush