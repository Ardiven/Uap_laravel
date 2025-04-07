<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class dev extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Db::table('developers')->insert([
            'name' => 'Ubisoft',
            'email' => '4d7j0@example.com',
            'created_at' => '2022-01-01',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'image' => 'developer_image/713b3ba06efe2d128a44f4a11ac8a636.jpg',
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
