<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Budi Santoso',
                'position' => 'Pengusaha',
                'content' => 'Bengkel Mobil Beteng Betawi adalah bengkel terbaik yang pernah saya kunjungi. Pelayanannya ramah, mekaniknya profesional, dan hasil perbaikannya memuaskan. Mobil saya seperti baru lagi!',
                'rating' => 5,
                'image' => 'testimonials/person1.jpg',
                'is_active' => true
            ],
            [
                'name' => 'Siti Rahma',
                'position' => 'Guru',
                'content' => 'Sangat puas dengan pelayanan di Bengkel Beteng Betawi. Mereka menjelaskan dengan detail masalah mobil saya dan memberikan solusi dengan biaya yang masuk akal. Tidak salah jadi pelanggan setia di sini.',
                'rating' => 5,
                'image' => 'testimonials/person2.jpg',
                'is_active' => true
            ],
            [
                'name' => 'Agus Hermawan',
                'position' => 'Karyawan Swasta',
                'content' => 'Pertama kali servis mobil di sini berdasarkan rekomendasi teman. Hasilnya sangat memuaskan! AC mobil saya yang tadinya tidak dingin sekarang sudah normal kembali. Harga juga bersaing.',
                'rating' => 4,
                'image' => 'testimonials/person3.jpg',
                'is_active' => true
            ],
            [
                'name' => 'Dewi Lestari',
                'position' => 'Wiraswasta',
                'content' => 'Mekaniknya handal dan ramah. Mobil saya yang bermasalah pada suspensi langsung ditangani dengan baik. Akan kembali lagi untuk servis berikutnya.',
                'rating' => 5,
                'image' => 'testimonials/person4.jpg',
                'is_active' => true
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}