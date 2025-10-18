<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@taskmanager.local'],
            [
                'name' => 'Admin',
                'password' => Hash::make('admin123456'),
                'email_verified_at' => now(),
//                'is_admin' => true, // adicione a coluna se quiser
            ]
        );
    }
}

