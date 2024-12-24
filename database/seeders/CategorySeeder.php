<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'title' => 'Cloud Computing',
                'slug' => 'cloud-computing',
            ],
            [
                'title' => 'Cybersecurity',
                'slug' => 'cybersecurity',
            ],
            [
                'title' => 'DevOps',
                'slug' => 'devops',
            ],
            [
                'title' => 'Software Development',
                'slug' => 'software-development',
            ],
            [
                'title' => 'E-Commerce',
                'slug' => 'e-commerce'
            ],
            [
                'title' => 'Web Development',
                'slug' => 'web-development',
            ],
            [
                'title' => 'Teknologi Terbaru',
                'slug' => 'teknologi-terbaru',
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
