<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Tune Up Mesin',
                'description' => '<p>Tune up mesin adalah layanan pemeliharaan kendaraan berkala yang memastikan mesin kendaraan Anda berfungsi dengan optimal. Layanan ini mencakup pemeriksaan menyeluruh terhadap komponen-komponen utama mesin seperti busi, filter udara, filter oli, timing belt, dan sistem pengapian.</p><p>Keuntungan melakukan tune up mesin secara berkala:</p><ul><li>Meningkatkan performa mesin</li><li>Menghemat konsumsi bahan bakar</li><li>Mengurangi emisi gas buang</li><li>Mencegah kerusakan yang lebih parah</li><li>Memperpanjang umur mesin</li></ul><p>Tim mekanik kami yang berpengalaman akan melakukan diagnostik menyeluruh dan memberikan rekomendasi perbaikan yang diperlukan untuk memastikan kendaraan Anda tetap dalam kondisi prima.</p>',
                'short_description' => 'Layanan pemeliharaan berkala untuk memastikan performa optimal mesin kendaraan Anda.',
                'price' => 350000,
                'image' => 'services/tune-up.jpg',
                'icon' => 'fa-engine',
                'is_featured' => true,
                'order' => 1
            ],
            [
                'name' => 'Servis AC Mobil',
                'description' => '<p>Layanan servis AC mobil kami mencakup pemeriksaan menyeluruh sistem pendingin kendaraan Anda. Tim teknisi AC kami yang berpengalaman akan mendiagnosis dan memperbaiki berbagai masalah AC mobil.</p><p>Layanan servis AC mobil meliputi:</p><ul><li>Pemeriksaan kebocoran freon</li><li>Isi ulang freon</li><li>Pembersihan filter AC</li><li>Perbaikan kompresor AC</li><li>Penggantian kondensor</li><li>Perbaikan blower AC</li></ul><p>Dengan melakukan servis AC secara berkala, Anda akan mendapatkan kenyamanan berkendara optimal dan mencegah kerusakan sistem AC yang lebih parah yang berpotensi membutuhkan biaya perbaikan yang lebih mahal.</p>',
                'short_description' => 'Perbaikan dan perawatan sistem pendingin mobil untuk kenyamanan berkendara optimal.',
                'price' => 450000,
                'image' => 'services/ac-service.jpg',
                'icon' => 'fa-snowflake',
                'is_featured' => true,
                'order' => 2
            ],
            [
                'name' => 'Ganti Oli',
                'description' => '<p>Penggantian oli mesin secara teratur adalah salah satu hal paling penting untuk menjaga performa dan umur mesin kendaraan Anda. Oli mesin berfungsi sebagai pelumas yang mengurangi gesekan antar komponen mesin, membantu pendinginan, dan membersihkan kotoran dalam mesin.</p><p>Layanan ganti oli kami meliputi:</p><ul><li>Penggantian oli mesin dengan merek berkualitas</li><li>Penggantian filter oli</li><li>Pemeriksaan level cairan kendaraan lainnya</li><li>Inspeksi visual terhadap kebocoran</li><li>Reset indikator servis (jika diperlukan)</li></ul><p>Kami menyediakan berbagai pilihan oli mesin berkualitas tinggi yang sesuai dengan spesifikasi kendaraan Anda untuk memastikan performa optimal mesin.</p>',
                'short_description' => 'Penggantian oli mesin berkala untuk menjaga performa dan umur mesin kendaraan Anda.',
                'price' => 200000,
                'image' => 'services/oil-change.jpg',
                'icon' => 'fa-oil-can',
                'is_featured' => true,
                'order' => 3
            ],
            [
                'name' => 'Perbaikan Rem',
                'description' => '<p>Sistem rem yang berfungsi dengan baik adalah aspek keselamatan paling penting dalam kendaraan Anda. Layanan perbaikan rem kami mencakup pemeriksaan menyeluruh terhadap seluruh komponen sistem pengereman.</p><p>Layanan perbaikan rem meliputi:</p><ul><li>Penggantian kampas rem (pad)</li><li>Penggantian cakram rem</li><li>Perbaikan kaliper rem</li><li>Penggantian tromol rem</li><li>Pemeriksaan minyak rem</li><li>Bleeding sistem rem</li><li>Perbaikan ABS</li></ul><p>Tim mekanik kami yang berpengalaman menggunakan suku cadang berkualitas untuk memastikan sistem pengereman kendaraan Anda berfungsi dengan optimal demi keselamatan berkendara.</p>',
                'short_description' => 'Perbaikan dan perawatan sistem pengereman untuk keselamatan berkendara Anda.',
                'price' => 500000,
                'image' => 'services/brake-repair.jpg',
                'icon' => 'fa-brake-system',
                'is_featured' => true,
                'order' => 4
            ],
            [
                'name' => 'Balancing & Spooring',
                'description' => '<p>Balancing dan spooring adalah proses penyetelan roda dan sistem kemudi kendaraan untuk memastikan kendaraan berjalan lurus dan stabil pada kecepatan tinggi. Layanan ini sangat penting untuk kenyamanan berkendara dan keamanan.</p><p>Manfaat balancing dan spooring:</p><ul><li>Mengurangi getaran pada roda</li><li>Memperpanjang umur ban</li><li>Meningkatkan stabilitas kendaraan</li><li>Mengoptimalkan kinerja suspensi</li><li>Mengurangi konsumsi bahan bakar</li></ul><p>Bengkel kami dilengkapi dengan peralatan modern untuk balancing dan spooring yang presisi, memberikan hasil yang optimal untuk kendaraan Anda.</p>',
                'short_description' => 'Penyetelan roda dan sistem kemudi untuk kenyamanan dan keamanan berkendara optimal.',
                'price' => 300000,
                'image' => 'services/wheel-alignment.jpg',
                'icon' => 'fa-car-side',
                'is_featured' => false,
                'order' => 5
            ],
            [
                'name' => 'Perbaikan Suspensi',
                'description' => '<p>Sistem suspensi kendaraan yang berfungsi dengan baik sangat penting untuk kenyamanan berkendara dan pengendalian kendaraan. Suspensi yang rusak dapat menyebabkan ketidakstabilan, keausan ban yang tidak merata, dan masalah pengereman.</p><p>Layanan perbaikan suspensi kami meliputi:</p><ul><li>Penggantian shock absorber</li><li>Perbaikan lower arm</li><li>Penggantian ball joint</li><li>Perbaikan stabilizer bar</li><li>Penggantian bushing suspensi</li><li>Pemeriksaan dan perbaikan per</li></ul><p>Dengan suspensi yang berfungsi optimal, Anda akan merasakan kenyamanan berkendara yang lebih baik dan pengendalian kendaraan yang lebih responsif.</p>',
                'short_description' => 'Perbaikan sistem suspensi untuk kenyamanan berkendara dan pengendalian kendaraan optimal.',
                'price' => 750000,
                'image' => 'services/suspension-repair.jpg',
                'icon' => 'fa-car-crash',
                'is_featured' => false,
                'order' => 6
            ],
        ];

        foreach ($services as $service) {
            Service::create([
                'name' => $service['name'],
                'slug' => Str::slug($service['name']),
                'description' => $service['description'],
                'short_description' => $service['short_description'],
                'price' => $service['price'],
                'image' => $service['image'],
                'icon' => $service['icon'],
                'is_featured' => $service['is_featured'],
                'order' => $service['order']
            ]);
        }
    }
}