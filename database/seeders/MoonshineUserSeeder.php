<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use MoonShine\Models\MoonshineUser;
use Illuminate\Support\Facades\Hash;

class MoonshineUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'shady',
                'moonshine_user_role_id' => 1,
                'email' => 'shady@gmail.com',
                // 'password' => '$2y$12$8lWQyVfYfRjSAsnXJKgSxu5pW.x8Pdx6ePnWu.eaMchzV4EsR57uK',
                'password' => Hash::make(
                    'password',
                    [
                        'memory' => 1024,
                        'time' => 2,
                        'threads' => 2,
                    ]
                ),
            ],
        ];
        foreach ($users as $user) {
            MoonshineUser::updateOrCreate(
                [
                    'name' => $user['name'],
                    'moonshine_user_role_id' => $user['moonshine_user_role_id'],
                    'email' => $user['email'],
                    'password' => $user['password']
                ]
            );
        }
    }
}
