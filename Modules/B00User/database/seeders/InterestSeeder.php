<?php

namespace Modules\B00User\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\B00User\Models\Interest;

class InterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $interests = [
            [
                'student_id' => 1,
                'categories' => [1, 2, 3],
            ],
            // [
            //     'student_id' => 2,
            //     'categories' => [1, 2, 3],
            // ],
            // [
            //     'student_id' => 3,
            //     'categories' => [1, 2, 3],
            // ],
        ];
        foreach ($interests as $interest) {
            foreach ($interest['categories'] as $categoryId) {
                Interest::create(
                    [
                        'student_id' => $interest['student_id'],
                        'category_id' => $categoryId,
                        'order' => 1,
                    ]
                );
            }
        }
    }
}
