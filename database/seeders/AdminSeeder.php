<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@corp.local'],
            ['name' => 'Super Admin', 'password' => Hash::make('Admin123!'), 'role_id' => 1]
        );
    }
}
