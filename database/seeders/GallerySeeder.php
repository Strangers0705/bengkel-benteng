<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gallery;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $galleries = [
            [
                'title' => 'Tune Up Mesin Toyota',
                'description' => 'Proses tune up mesin Toyota Avanza yang dilakukan oleh mekanik profesional kami',
                'image' => 'gallery/tune-up-1.jpg',
                'category' => 'Tune Up',
                'is_active' => true
            ],
            [
                'title' => 'Perbaikan AC Honda',
                'description' => 'Perbaikan sistem AC pada Honda Civic yang mengalami kebocoran freon',
                'image' => 'gallery/ac-repair-1.jpg',
                'category' => 'Servis AC',
                'is_active' => true
            ],
            [
                'title' => 'Penggantian Rem Daihatsu',
                'description' => 'Proses penggantian kampas rem dan cakram pada Daihatsu Xenia',
                'image' => 'gallery/brake-1.jpg',
                'category' => 'Perbaikan Rem',
                'is_active' => true
            ],
            [
                'title' => 'Balancing Roda Mitsubishi',
                'description' => 'Proses balancing roda pada Mitsubishi Pajero Sport',
                'image' => 'gallery/wheel-1.jpg',
                'category' => 'Balancing & Spooring',
                'is_active' => true
            ],
            [
                'title' => 'Ganti Oli Suzuki',
                'description' => 'Penggantian oli mesin dan filter oli pada Suzuki Ertiga',
                'image' => 'gallery/oil-1.jpg',
                'category' => 'Ganti Oli',
                'is_active' => true
            ],
            [
                'title' => 'Perbaikan Suspensi Nissan',
                'description' => 'Perbaikan shock absorber dan bushing pada Nissan X-Trail',
                'image' => 'gallery/suspension-1.jpg',
                'category' => 'Perbaikan Suspensi',
                'is_active' => true
            ],
        ];

        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }
    }
}