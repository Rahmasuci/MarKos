<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class FacilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('facilities')->insert([
            'facility' => 'Kasur',
            'created_at' => now(),
            'updated_at' => now(),       
        ]);
        DB::table('facilities')->insert([
            'facility' => 'Dapur',
            'created_at' => now(),
            'updated_at' => now(),  
        ]);
        DB::table('facilities')->insert([
            'facility' => 'Lemari',
            'created_at' => now(),
            'updated_at' => now(),       
        ]);
        DB::table('facilities')->insert([
            'facility' => 'Wifi',
            'created_at' => now(),
            'updated_at' => now(),       
        ]);
        DB::table('facilities')->insert([
            'facility' => 'Parkir Sepeda',
            'created_at' => now(),
            'updated_at' => now(),  
        ]);
        DB::table('facilities')->insert([
            'facility' => 'TV',
            'created_at' => now(),
            'updated_at' => now(),       
        ]);
        DB::table('facilities')->insert([
            'facility' => 'Kamar Mandi Dalam',
            'created_at' => now(),
            'updated_at' => now(),       
        ]);
        DB::table('facilities')->insert([
            'facility' => 'Mesin Cuci',
            'created_at' => now(),
            'updated_at' => now(),  
        ]);
        DB::table('facilities')->insert([
            'facility' => 'Tempat Jemur',
            'created_at' => now(),
            'updated_at' => now(),       
        ]);
        DB::table('facilities')->insert([
            'facility' => 'Ruang Tamu',
            'created_at' => now(),
            'updated_at' => now(),       
        ]);
    }
}
