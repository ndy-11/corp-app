<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->upsert([
            ['id' => 1, 'name' => 'Admin'],
            ['id' => 2, 'name' => 'Manager'],
            ['id' => 3, 'name' => 'Staff'],
            ['id' => 4, 'name' => 'User'],
        ], ['id'], ['name']);
    }
}
