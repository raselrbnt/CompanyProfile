<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        $projects = [
            [
                'title' => 'Renovasi Kantor Modern',
                'description' => 'Proyek renovasi kantor dengan konsep modern dan minimalis.',
                'client' => 'PT Maju Bersama',
                'completion_date' => '2023-05-15',
                'location' => 'Jakarta Selatan',
                'featured_image' => 'projects/office-renovation.jpg',
                'is_featured' => true,
                'images' => [
                    [
                        'image' => 'projects/office-renovation-1.jpg',
                        'caption' => 'Area Resepsionis',
                        'order' => 1,
                    ],
                    [
                        'image' => 'projects/office-renovation-2.jpg',
                        'caption' => 'Ruang Rapat',
                        'order' => 2,
                    ],
                ],
            ],
            [
                'title' => 'Desain Interior Rumah Minimalis',
                'description' => 'Proyek desain interior untuk rumah dengan konsep minimalis dan modern.',
                'client' => 'Keluarga Santoso',
                'completion_date' => '2023-07-20',
                'location' => 'Bandung',
                'featured_image' => 'projects/minimalist-house.jpg',
                'is_featured' => true,
                'images' => [
                    [
                        'image' => 'projects/minimalist-house-1.jpg',
                        'caption' => 'Ruang Tamu',
                        'order' => 1,
                    ],
                    [
                        'image' => 'projects/minimalist-house-2.jpg',
                        'caption' => 'Dapur',
                        'order' => 2,
                    ],
                ],
            ],
        ];

        foreach ($projects as $projectData) {
            $images = $projectData['images'];
            unset($projectData['images']);
            
            $project = Project::create($projectData);
            
            foreach ($images as $imageData) {
                $imageData['project_id'] = $project->id;
                ProjectImage::create($imageData);
            }
        }
    }
}