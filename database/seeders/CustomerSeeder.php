<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = [
            [
                'name' => 'Ahmad Rizki',
                'email' => 'ahmad@example.com',
                'phone' => '08123456789',
                'avatar' => 'customers/ahmad.jpg',
            ],
            [
                'name' => 'Siti Rahayu',
                'email' => 'siti@example.com',
                'phone' => '08234567890',
                'avatar' => 'customers/siti.jpg',
            ],
            [
                'name' => 'Eko Prasetyo',
                'email' => 'eko@example.com',
                'phone' => '08345678901',
                'avatar' => 'customers/eko.jpg',
            ],
            [
                'name' => 'Dewi Lestari',
                'email' => 'dewi@example.com',
                'phone' => '08456789012',
                'avatar' => 'customers/dewi.jpg',
            ],
            [
                'name' => 'Joko Widodo',
                'email' => 'joko@example.com',
                'phone' => '08567890123',
                'avatar' => 'customers/joko.jpg',
            ],
        ];

        foreach ($customers as $customer) {
            Customer::create($customer);
        }
    }
}