<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'address' => 'jln',
            'phone_number' => '081234567890',
            'category' => 'Admin',
            'password' => bcrypt('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'Pemilik Kos',
            'email' => 'owner@owner.com',
            'address' => 'jln',
            'phone_number' => '081234567890',
            'category' => 'Pemilik kos',
            'password' => bcrypt('password'),
            
        ]);
        DB::table('users')->insert([
            'name' => 'Pengguna',            
            'email' => 'user@user.com',
            'address' => 'jln',
            'phone_number' => '081234567890',
            'category' => 'Pengguna',
            'password' => bcrypt('password'),
            
        ]);
    }
}
