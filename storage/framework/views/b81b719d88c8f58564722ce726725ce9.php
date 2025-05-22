<?php $__env->startSection('title', 'Bengkel Mobil Beteng Betawi - Bengkel Terpercaya di Jakarta'); ?>

<?php $__env->startSection('meta_description', 'Bengkel Mobil Beteng Betawi - Layanan servis dan perbaikan mobil terpercaya di Jakarta dengan teknisi profesional dan peralatan modern.'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-primary-900 to-primary-700 text-white">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="absolute inset-0 bg-[url('<?php echo e(asset('images/hero-bg.jpg')); ?>')] bg-cover bg-center mix-blend-overlay"></div>
        
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10 py-20 md:py-32">
            <div class="max-w-3xl">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold font-heading leading-tight mb-6 animate__animated animate__fadeInUp">
                    Bengkel Mobil Terpercaya di Jakarta
                </h1>
                <p class="text-lg md:text-xl mb-8 text-gray-100 animate__animated animate__fadeInUp animate__delay-1s">
                    Layanan servis dan perbaikan mobil berkualitas dengan teknisi berpengalaman dan peralatan modern
                </p>
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 animate__animated animate__fadeInUp animate__delay-2s">
                    <a href="<?php echo e(route('appointment')); ?>" class="inline-block bg-secondary-600 hover:bg-secondary-700 text-white font-medium px-6 py-3 rounded-md shadow-lg transition duration-300 text-center">
                        Buat Janji Sekarang
                    </a>
                    <a href="<?php echo e(route('services')); ?>" class="inline-block bg-white hover:bg-gray-100 text-primary-800 font-medium px-6 py-3 rounded-md shadow-lg transition duration-300 text-center">
                        Lihat Layanan Kami
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Quick Contact Bar -->
        <div class="bg-white py-4 shadow-md relative z-10">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="flex items-center justify-center md:justify-start">
                        <i class="fas fa-phone-alt mr-3 text-2xl text-secondary-600"></i>
                        <div>
                            <div class="text-sm text-gray-500">Hubungi Kami</div>
                            <div class="font-semibold text-primary-800">(021) 1234-5678</div>
                        </div>
                    </div>
                    <div class="flex items-center justify-center md:justify-start">
                        <i class="fas fa-map-marker-alt mr-3 text-2xl text-secondary-600"></i>
                        <div>
                            <div class="text-sm text-gray-500">Lokasi Kami</div>
                            <div class="font-semibold text-primary-800">Jl. Raya Beteng Betawi No. 123, Jakarta</div>
                        </div>
                    </div>
                    <div class="flex items-center justify-center md:justify-start">
                        <i class="fas fa-clock mr-3 text-2xl text-secondary-600"></i>
                        <div>
                            <div class="text-sm text-gray-500">Jam Operasional</div>
                            <div class="font-semibold text-primary-800">Senin - Sabtu: 08:00 - 17:00</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- About Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center gap-8">
                <div class="md:w-1/2">
                    <div class="relative">
                        <img src="<?php echo e(asset('images/about-image.jpg')); ?>" alt="Bengkel Mobil Beteng Betawi" class="rounded-lg shadow-lg w-full">
                        <div class="absolute -bottom-6 -right-6 bg-secondary-600 text-white p-4 rounded-lg shadow-lg hidden md:block">
                            <p class="text-2xl font-bold">15+</p>
                            <p class="text-sm">Tahun Pengalaman</p>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2 mt-8 md:mt-0">
                    <h2 class="text-3xl font-bold font-heading text-primary-800 mb-4">Tentang Bengkel Mobil Beteng Betawi</h2>
                    <div class="w-20 h-1 bg-secondary-600 mb-6"></div>
                    <p class="text-gray-700 mb-6">
                        Bengkel Mobil Beteng Betawi adalah bengkel mobil terpercaya di Jakarta yang telah melayani ribuan pelanggan sejak 2008. Kami menyediakan layanan servis dan perbaikan mobil berkualitas dengan teknisi berpengalaman dan peralatan modern.
                    </p>
                    <p class="text-gray-700 mb-6">
                        Fokus utama kami adalah memberikan pelayanan terbaik dengan standar tinggi dan harga yang transparan. Kami percaya bahwa kejujuran dan kualitas kerja yang baik adalah kunci untuk membangun kepercayaan dengan pelanggan.
                    </p>
                    <div class="grid grid-cols-2 gap-4 mb-8">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-secondary-600 mr-2"></i>
                            <span class="text-gray-700">Teknisi Berpengalaman</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-secondary-600 mr-2"></i>
                            <span class="text-gray-700">Peralatan Modern</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-secondary-600 mr-2"></i>
                            <span class="text-gray-700">Harga Transparan</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-secondary-600 mr-2"></i>
                            <span class="text-gray-700">Garansi Servis</span>
                        </div>
                    </div>
                    <a href="<?php echo e(route('about')); ?>" class="inline-block bg-primary-600 hover:bg-primary-700 text-white font-medium px-6 py-3 rounded-md shadow transition duration-300">
                        Selengkapnya Tentang Kami
                    </a>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Services Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold font-heading text-primary-800 mb-4">Layanan Kami</h2>
                <div class="w-20 h-1 bg-secondary-600 mx-auto mb-6"></div>
                <p class="text-gray-700 max-w-2xl mx-auto">
                    Kami menyediakan berbagai layanan perawatan dan perbaikan untuk menjaga kendaraan Anda tetap dalam kondisi prima
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-gray-50 rounded-lg shadow-md hover:shadow-lg transition duration-300 overflow-hidden group">
                    <div class="relative h-48 overflow-hidden">
                        <img src="<?php echo e(asset($service->image)); ?>" alt="<?php echo e($service->name); ?>" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-primary-900 opacity-20 group-hover:opacity-50 transition duration-300"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold font-heading text-primary-800 mb-3 group-hover:text-primary-600 transition duration-300"><?php echo e($service->name); ?></h3>
                        <p class="text-gray-700 mb-4"><?php echo e($service->short_description); ?></p>
                        <p class="text-gray-500 mb-4">Harga: <?php echo e($service->price_range); ?></p>
                        <a href="<?php echo e(route('services.show', $service->slug)); ?>" class="inline-block text-secondary-600 hover:text-secondary-700 font-medium transition duration-300">
                            Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
            <div class="text-center mt-10">
                <a href="<?php echo e(route('services')); ?>" class="inline-block bg-primary-600 hover:bg-primary-700 text-white font-medium px-6 py-3 rounded-md shadow transition duration-300">
                    Lihat Semua Layanan
                </a>
            </div>
        </div>
    </section>
    
    <!-- Why Choose Us Section -->
    <section class="py-16 bg-gray-900 text-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold font-heading text-white mb-4">Mengapa Memilih Kami</h2>
                <div class="w-20 h-1 bg-secondary-600 mx-auto mb-6"></div>
                <p class="text-gray-300 max-w-2xl mx-auto">
                    Keunggulan kami dalam memberikan layanan terbaik untuk kendaraan Anda
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 text-center">
                    <div class="w-16 h-16 mx-auto bg-primary-600 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-tools text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold font-heading text-white mb-3">Teknisi Profesional</h3>
                    <p class="text-gray-300">
                        Tim teknisi kami terdiri dari profesional berpengalaman dengan sertifikasi khusus di bidangnya
                    </p>
                </div>
                
                <div class="bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 text-center">
                    <div class="w-16 h-16 mx-auto bg-primary-600 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-laptop text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold font-heading text-white mb-3">Peralatan Modern</h3>
                    <p class="text-gray-300">
                        Menggunakan peralatan diagnostik dan perbaikan modern untuk hasil yang akurat dan efisien
                    </p>
                </div>
                
                <div class="bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 text-center">
                    <div class="w-16 h-16 mx-auto bg-primary-600 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-shield-alt text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold font-heading text-white mb-3">Garansi Servis</h3>
                    <p class="text-gray-300">
                        Memberikan garansi untuk setiap pekerjaan servis dan perbaikan yang kami lakukan
                    </p>
                </div>
                
                <div class="bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 text-center">
                    <div class="w-16 h-16 mx-auto bg-primary-600 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-coins text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold font-heading text-white mb-3">Harga Transparan</h3>
                    <p class="text-gray-300">
                        Menawarkan harga yang transparan dan bersaing tanpa biaya tersembunyi
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Testimonials Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold font-heading text-primary-800 mb-4">Apa Kata Pelanggan Kami</h2>
                <div class="w-20 h-1 bg-secondary-600 mx-auto mb-6"></div>
                <p class="text-gray-700 max-w-2xl mx-auto">
                    Testimoni dari pelanggan yang telah mempercayakan kendaraan mereka pada layanan kami
                </p>
            </div>
            
            <div class="testimonials-slider">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="swiper-slide">
                            <div class="bg-white p-6 rounded-lg shadow-md">
                                <div class="flex items-center mb-4">
                                    <img src="<?php echo e(asset($testimonial->customer->avatar)); ?>" alt="<?php echo e($testimonial->customer->name); ?>" class="w-12 h-12 rounded-full mr-4">
                                    <div>
                                        <h4 class="text-lg font-semibold text-primary-800"><?php echo e($testimonial->customer->name); ?></h4>
                                        <p class="text-gray-500 text-sm"><?php echo e($testimonial->service_type); ?></p>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                        <?php if($i <= $testimonial->rating): ?>
                                            <i class="fas fa-star text-yellow-400"></i>
                                        <?php else: ?>
                                            <i class="far fa-star text-yellow-400"></i>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </div>
                                <p class="text-gray-700"><?php echo e($testimonial->content); ?></p>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="swiper-pagination mt-6"></div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="py-16 bg-primary-800 text-white relative">
        <div class="absolute inset-0 bg-black opacity-40"></div>
        <div class="absolute inset-0 bg-[url('<?php echo e(asset('images/cta-bg.jpg')); ?>')] bg-cover bg-center mix-blend-overlay"></div>
        
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl font-bold font-heading mb-6">Jadwalkan Servis Kendaraan Anda Sekarang</h2>
                <p class="text-xl mb-8 text-gray-100">
                    Percayakan kendaraan Anda pada ahlinya. Kami siap memberikan layanan terbaik.
                </p>
                <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="<?php echo e(route('appointment')); ?>" class="inline-block bg-secondary-600 hover:bg-secondary-700 text-white font-medium px-6 py-3 rounded-md shadow-lg transition duration-300 text-center">
                        Buat Janji Sekarang
                    </a>
                    <a href="tel:+6281234567890" class="inline-block bg-white hover:bg-gray-100 text-primary-800 font-medium px-6 py-3 rounded-md shadow-lg transition duration-300 text-center">
                        <i class="fas fa-phone-alt mr-2"></i> Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Swiper('.testimonials-slider .swiper-container', {
            slidesPerView: 1,
            spaceBetween: 30,
            pagination: {
                el: '.testimonials-slider .swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            },
            autoplay: {
                delay: 5000,
            },
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\project\resources\views/home.blade.php ENDPATH**/ ?>