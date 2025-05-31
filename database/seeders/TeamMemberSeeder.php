<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run()
    {
        $members = [
            [
                'name' => 'Budi Santoso',
                'position' => 'Founder & CEO',
                'bio' => 'Budi memiliki pengalaman lebih dari 15 tahun dalam industri desain interior.',
                'photo' => 'team/budi-santoso.jpg',
                'email' => 'budi@example.com',
                'phone' => '081234567890',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Siti Rahayu',
                'position' => 'Lead Designer',
                'bio' => 'Siti adalah desainer interior berpengalaman dengan latar belakang arsitektur.',
                'photo' => 'team/siti-rahayu.jpg',
                'email' => 'siti@example.com',
                'phone' => '081234567891',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Agus Wijaya',
                'position' => 'Project Manager',
                'bio' => 'Agus mengawasi semua proyek untuk memastikan kualitas dan ketepatan waktu.',
                'photo' => 'team/agus-wijaya.jpg',
                'email' => 'agus@example.com',
                'phone' => '081234567892',
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($members as $member) {
            TeamMember::create($member);
        }
    }
}