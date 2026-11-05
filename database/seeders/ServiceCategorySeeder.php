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
            ],
            [
                'name' => 'Document Request',
                'description' => 'Request for school documents and certificates.',
            ],
            [
                'name' => 'Scholarship',
                'description' => 'Scholarship information and assistance.',
            ],
            [
                'name' => 'Technical Support',
                'description' => 'Help with student portal and technical concerns.',
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
