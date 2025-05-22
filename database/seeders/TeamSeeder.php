<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teams = [
            [
                'name' => 'Budi Santoso',
                'position' => 'Kepala Mekanik',
                'bio' => 'Budi memiliki pengalaman lebih dari 15 tahun dalam perbaikan kendaraan dari berbagai merek. Spesialisasi beliau adalah diagnosis masalah mesin dan kelistrikan.',
                'image' => 'team/budi.jpg',
                'years_experience' => 15,
            ],
            [
                'name' => 'Agus Pratama',
                'position' => 'Mekanik Senior',
                'bio' => 'Agus adalah mekanik senior dengan keahlian khusus pada sistem transmisi dan suspensi. Beliau telah menangani ribuan kasus perbaikan selama karirnya.',
                'image' => 'team/agus.jpg',
                'years_experience' => 12,
            ],
            [
                'name' => 'Rudi Hermawan',
                'position' => 'Spesialis AC & Kelistrikan',
                'bio' => 'Rudi fokus pada perbaikan sistem AC dan kelistrikan mobil. Dengan sertifikasi khusus, beliau mampu mendiagnosis masalah kompleks dengan cepat dan tepat.',
                'image' => 'team/rudi.jpg',
                'years_experience' => 10,
            ],
            [
                'name' => 'Dedi Kurniawan',
                'position' => 'Mekanik',
                'bio' => 'Dedi adalah mekanik muda berbakat dengan pengetahuan mendalam tentang teknologi mobil modern. Beliau menangani tune up dan perawatan berkala.',
                'image' => 'team/dedi.jpg',
                'years_experience' => 5,
            ],
        ];

        foreach ($teams as $team) {
            Team::create($team);
        }
    }
}