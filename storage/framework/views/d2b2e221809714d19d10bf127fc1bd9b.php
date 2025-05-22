<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('title', 'Bengkel Mobil Beteng Betawi'); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description', 'Bengkel Mobil Beteng Betawi - Layanan servis dan perbaikan mobil terpercaya di Jakarta dengan teknisi profesional dan peralatan modern.'); ?>">
    
    <!-- Favicon -->
    <link rel="icon" href="<?php echo e(asset('favicon.ico')); ?>" type="image/x-icon">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/3010b1efd9.js" crossorigin="anonymous"></script>
    
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-800">
    <!-- Header -->
    <?php echo $__env->make('layouts.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
    <!-- Main Content -->
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    
    <!-- Footer -->
    <?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
    <!-- WhatsApp Float Button -->
    <a href="https://wa.me/6281234567890?text=Halo%20Bengkel%20Beteng%20Betawi,%20saya%20ingin%20bertanya" 
       class="fixed bottom-6 right-6 bg-green-500 hover:bg-green-600 text-white p-3 rounded-full shadow-lg transition duration-300 z-50">
        <i class="fab fa-whatsapp text-2xl"></i>
    </a>
    
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\project\resources\views/layouts/app.blade.php ENDPATH**/ ?>