@extends('layouts.app')

@section('title', 'Janji Berhasil Dibuat - Bengkel Mobil Beteng Betawi')

@section('meta_description', 'Terima kasih telah membuat janji servis di Bengkel Mobil Beteng Betawi. Janji Anda telah berhasil dibuat dan tim kami akan segera menghubungi Anda.')

@section('content')
    <!-- Success Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto text-center">
                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-check text-green-500 text-4xl"></i>
                </div>
                
                <h1 class="text-3xl md:text-4xl font-bold font-heading text-primary-800 mb-4">Janji Anda Berhasil Dibuat!</h1>
                <p class="text-xl text-gray-700 mb-8">
                    Terima kasih telah membuat janji servis di Bengkel Mobil Beteng Betawi.
                </p>
                
                <div class="bg-gray-50 p-6 rounded-lg shadow-md mb-8 text-left">
                    <h2 class="text-xl font-semibold font-heading text-primary-800 mb-4">Langkah Selanjutnya</h2>
                    <ul class="space-y-3 text-gray-700">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <span>Tim kami akan mengkonfirmasi janji Anda melalui telepon atau email dalam waktu 1-2 jam pada jam kerja.</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <span>Harap datang 15 menit sebelum waktu janji yang telah ditentukan.</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <span>Jika Anda perlu membatalkan atau mengubah jadwal janji, harap hubungi kami minimal 3 jam sebelumnya.</span>
                        </li>
                    </ul>
                </div>
                
                <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="{{ route('home') }}" class="inline-block bg-primary-600 hover:bg-primary-700 text-white font-medium px-6 py-3 rounded-md shadow transition duration-300">
                        Kembali ke Beranda
                    </a>
                    <a href="{{ route('services') }}" class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium px-6 py-3 rounded-md shadow transition duration-300">
                        Lihat Layanan Kami
                    </a>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Contact Info Section -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold font-heading text-primary-800">Butuh Bantuan?</h2>
                <p class="text-gray-700">Jika Anda memiliki pertanyaan, silakan hubungi kami:</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-3xl mx-auto">
                <div class="flex items-center justify-center">
                    <i class="fas fa-phone-alt text-primary-600 text-xl mr-3"></i>
                    <div>
                        <div class="text-sm text-gray-500">Telepon</div>
                        <div class="font-semibold">(021) 1234-5678</div>
                    </div>
                </div>
                <div class="flex items-center justify-center">
                    <i class="fab fa-whatsapp text-green-500 text-xl mr-3"></i>
                    <div>
                        <div class="text-sm text-gray-500">WhatsApp</div>
                        <div class="font-semibold">0812-3456-7890</div>
                    </div>
                </div>
                <div class="flex items-center justify-center">
                    <i class="fas fa-envelope text-primary-600 text-xl mr-3"></i>
                    <div>
                        <div class="text-sm text-gray-500">Email</div>
                        <div class="font-semibold">info@bengkelbetengbetawi.com</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection