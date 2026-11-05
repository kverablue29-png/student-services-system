<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceCategory;

class ServiceCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Enrollment',
                'description' => 'Assistance with student enrollment.',
                'is_active' => true,
            ],
            [
                'name' => 'Document Request',
                'description' => 'Request for school documents and certificates.',
                'is_active' => true,
            ],
            [
                'name' => 'Scholarship',
                'description' => 'Scholarship information and assistance.',
                'is_active' => true,
            ],
            [
                'name' => 'Technical Support',
                'description' => 'Help with student portal and technical concerns.',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            ServiceCategory::updateOrCreate(
                ['name' => $category['name']],
                $category
            );
        }
    }
}
