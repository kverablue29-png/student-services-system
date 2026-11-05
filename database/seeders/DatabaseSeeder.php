<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use RuntimeException;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seed service categories
        $this->call([
            ServiceCategorySeeder::class,
        ]);

        // Admin account configuration
        $email = env('ADMIN_EMAIL');
        $password = env('ADMIN_PASSWORD');

        if (!$email || !$password) {
            throw new RuntimeException(
                'Admin environment variables are missing.'
            );
        }

        $existing = User::where('email', $email)->first();

        if ($existing) {
            if ($existing->role !== 'admin') {
                throw new RuntimeException(
                    'Admin email is already used by a non-admin account.'
                );
            }

            return;
        }

        $admin = new User();
        $admin->name = 'System Admin';
        $admin->email = $email;
        $admin->password = Hash::make($password);
        $admin->save();

        $admin->forceFill([
            'role' => 'admin',
        ])->save();
    }
}