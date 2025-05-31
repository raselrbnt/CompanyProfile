<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $services = [
            [
                'name' => 'Desain Interior',
                'description' => 'Layanan desain interior profesional untuk rumah, kantor, dan ruang komersial.',
                'icon' => 'design-icon.svg',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'name' => 'Renovasi',
                'description' => 'Layanan renovasi lengkap untuk memperbarui dan meningkatkan ruang Anda.',
                'icon' => 'renovation-icon.svg',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'name' => 'Konsultasi',
                'description' => 'Konsultasi dengan desainer interior berpengalaman untuk proyek Anda.',
                'icon' => 'consultation-icon.svg',
                'is_active' => true,
                'order' => 3,
            ],
            [
                'name' => 'Furniture Custom',
                'description' => 'Pembuatan furniture custom sesuai dengan kebutuhan dan desain Anda.',
                'icon' => 'furniture-icon.svg',
                'is_active' => true,
                'order' => 4,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}