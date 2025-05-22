@extends('layouts.app')

@section('title', 'Tentang Kami - Bengkel Mobil Beteng Betawi')

@section('meta_description', 'Bengkel Mobil Beteng Betawi - Sejarah, misi, dan tim profesional kami yang siap melayani kebutuhan perbaikan kendaraan Anda di Jakarta.')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-primary-800 text-white py-20">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="absolute inset-0 bg-[url('{{ asset('images/about-hero.jpg') }}')] bg-cover bg-center mix-blend-overlay"></div>
        
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-3xl">
                <h1 class="text-4xl md:text-5xl font-bold font-heading leading-tight mb-6">
                    Tentang Kami
                </h1>
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
                                <span class="text-gray-100">Tentang Kami</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    
    <!-- About Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col-reverse md:flex-row items-center gap-8">
                <div class="md:w-1/2">
                    <h2 class="text-3xl font-bold font-heading text-primary-800 mb-4">Bengkel Mobil Beteng Betawi</h2>
                    <div class="w-20 h-1 bg-secondary-600 mb-6"></div>
                    <p class="text-gray-700 mb-6">
                        Didirikan pada tahun 2008, Bengkel Mobil Beteng Betawi telah menjadi bengkel terpercaya di Jakarta yang mengutamakan kualitas dan kepuasan pelanggan. Kami telah melayani ribuan pelanggan dan menerima kepercayaan mereka untuk memperbaiki dan merawat kendaraan mereka.
                    </p>
                    <p class="text-gray-700 mb-6">
                        Bengkel kami dilengkapi dengan peralatan modern dan canggih untuk mendiagnosis dan memperbaiki berbagai masalah pada kendaraan. Tim teknisi kami terdiri dari profesional berpengalaman yang memiliki keahlian khusus di bidang otomotif.
                    </p>
                    <p class="text-gray-700 mb-6">
                        Kami memahami bahwa kendaraan adalah investasi penting bagi pelanggan kami, oleh karena itu kami selalu memberikan layanan terbaik dengan standar kualitas tinggi dan harga yang transparan.
                    </p>
                </div>
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <div class="relative">
                        <img src="{{ asset('images/about-main.jpg') }}" alt="Bengkel Mobil Beteng Betawi" class="rounded-lg shadow-lg w-full">
                        <div class="absolute -bottom-6 -right-6 bg-secondary-600 text-white p-4 rounded-lg shadow-lg hidden md:block">
                            <p class="text-2xl font-bold">15+</p>
                            <p class="text-sm">Tahun Pengalaman</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Mission & Vision Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold font-heading text-primary-800 mb-4">Misi & Visi Kami</h2>
                <div class="w-20 h-1 bg-secondary-600 mx-auto mb-6"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <div class="w-16 h-16 bg-primary-600 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-bullseye text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold font-heading text-primary-800 mb-4 text-center">Misi Kami</h3>
                    <p class="text-gray-700 mb-4">
                        Misi kami adalah memberikan layanan perbaikan dan perawatan kendaraan berkualitas tinggi dengan harga yang transparan dan terjangkau. Kami berkomitmen untuk:
                    </p>
                    <ul class="space-y-2 text-gray-700">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-secondary-600 mt-1 mr-2"></i>
                            <span>Memberikan layanan yang jujur dan profesional</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-secondary-600 mt-1 mr-2"></i>
                            <span>Menggunakan suku cadang berkualitas dan peralatan modern</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-secondary-600 mt-1 mr-2"></i>
                            <span>Memberikan edukasi kepada pelanggan tentang perawatan kendaraan</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-secondary-600 mt-1 mr-2"></i>
                            <span>Terus meningkatkan keterampilan dan pengetahuan tim kami</span>
                        </li>
                    </ul>
                </div>
                
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <div class="w-16 h-16 bg-primary-600 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-eye text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold font-heading text-primary-800 mb-4 text-center">Visi Kami</h3>
                    <p class="text-gray-700 mb-4">
                        Visi kami adalah menjadi bengkel mobil terkemuka di Jakarta yang dikenal karena keunggulan layanan, integritas, dan kepuasan pelanggan. Kami bertujuan untuk:
                    </p>
                    <ul class="space-y-2 text-gray-700">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-secondary-600 mt-1 mr-2"></i>
                            <span>Menjadi pemimpin dalam inovasi layanan perbaikan kendaraan</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-secondary-600 mt-1 mr-2"></i>
                            <span>Memperluas jangkauan layanan ke seluruh wilayah Jakarta</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-secondary-600 mt-1 mr-2"></i>
                            <span>Menciptakan standar baru dalam layanan bengkel yang profesional</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-secondary-600 mt-1 mr-2"></i>
                            <span>Berkontribusi pada lingkungan melalui praktik ramah lingkungan</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Our Team Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold font-heading text-primary-800 mb-4">Tim Profesional Kami</h2>
                <div class="w-20 h-1 bg-secondary-600 mx-auto mb-6"></div>
                <p class="text-gray-700 max-w-2xl mx-auto">
                    Kenali para profesional berpengalaman yang akan menangani kendaraan Anda
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($team as $member)
                <div class="bg-gray-50 rounded-lg shadow-md overflow-hidden transition duration-300 hover:shadow-lg group">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset($member->image) }}" alt="{{ $member->name }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-primary-900 opacity-0 group-hover:opacity-70 transition duration-300 flex items-center justify-center">
                            <div class="text-white text-center p-4 transform translate-y-10 group-hover:translate-y-0 transition duration-300">
                                <p>{{ $member->years_experience }} Tahun Pengalaman</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold font-heading text-primary-800 mb-1">{{ $member->name }}</h3>
                        <p class="text-secondary-600 mb-3">{{ $member->position }}</p>
                        <p class="text-gray-700">{{ $member->bio }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    
    <!-- Stats Section -->
    <section class="py-16 bg-primary-800 text-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-5xl font-bold mb-2">15+</div>
                    <div class="text-xl font-heading">Tahun Pengalaman</div>
                </div>
                <div class="text-center">
                    <div class="text-5xl font-bold mb-2">5,000+</div>
                    <div class="text-xl font-heading">Pelanggan Puas</div>
                </div>
                <div class="text-center">
                    <div class="text-5xl font-bold mb-2">10+</div>
                    <div class="text-xl font-heading">Teknisi Ahli</div>
                </div>
                <div class="text-center">
                    <div class="text-5xl font-bold mb-2">25+</div>
                    <div class="text-xl font-heading">Layanan Tersedia</div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Facilities Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold font-heading text-primary-800 mb-4">Fasilitas Bengkel</h2>
                <div class="w-20 h-1 bg-secondary-600 mx-auto mb-6"></div>
                <p class="text-gray-700 max-w-2xl mx-auto">
                    Kami menyediakan fasilitas modern dan nyaman untuk memastikan kendaraan Anda mendapatkan perawatan terbaik
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-50 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <div class="h-48 overflow-hidden">
                        <img src="{{ asset('images/facilities/workshop-area.jpg') }}" alt="Area Bengkel" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold font-heading text-primary-800 mb-3">Area Bengkel Luas</h3>
                        <p class="text-gray-700">
                            Area bengkel yang luas dengan peralatan modern dan keamanan tinggi untuk kendaraan Anda
                        </p>
                    </div>
                </div>
                
                <div class="bg-gray-50 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <div class="h-48 overflow-hidden">
                        <img src="{{ asset('images/facilities/diagnostic-tools.jpg') }}" alt="Peralatan Diagnostik" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold font-heading text-primary-800 mb-3">Peralatan Diagnostik Modern</h3>
                        <p class="text-gray-700">
                            Dilengkapi dengan scanner dan peralatan diagnostik terbaru untuk deteksi masalah secara akurat
                        </p>
                    </div>
                </div>
                
                <div class="bg-gray-50 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <div class="h-48 overflow-hidden">
                        <img src="{{ asset('images/facilities/waiting-room.jpg') }}" alt="Ruang Tunggu" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold font-heading text-primary-800 mb-3">Ruang Tunggu Nyaman</h3>
                        <p class="text-gray-700">
                            Ruang tunggu nyaman dengan WiFi gratis, kopi, dan televisi untuk kenyamanan Anda selama menunggu
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="py-16 bg-gray-900 text-white relative">
        <div class="absolute inset-0 bg-[url('{{ asset('images/cta-bg.jpg') }}')] bg-cover bg-center opacity-20"></div>
        
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl font-bold font-heading mb-6">Siap Mengalami Layanan Bengkel Terbaik?</h2>
                <p class="text-xl mb-8 text-gray-300">
                    Jadwalkan servis kendaraan Anda sekarang dan rasakan perbedaan layanan dari Bengkel Mobil Beteng Betawi.
                </p>
                <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="{{ route('appointment') }}" class="inline-block bg-secondary-600 hover:bg-secondary-700 text-white font-medium px-6 py-3 rounded-md shadow-lg transition duration-300 text-center">
                        Buat Janji Sekarang
                    </a>
                    <a href="{{ route('contact') }}" class="inline-block bg-white hover:bg-gray-100 text-primary-800 font-medium px-6 py-3 rounded-md shadow-lg transition duration-300 text-center">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection