<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ConditionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('conditions')->insert([
            'condition' => 'Bersih',
            'created_at' => now(),
            'updated_at' => now(),       
        ]);
        DB::table('conditions')->insert([
            'condition' => 'Baru dicat ulang',
            'created_at' => now(),
            'updated_at' => now(),  
        ]);
        DB::table('conditions')->insert([
            'condition' => '1 lokasi dengan pemilik',
            'created_at' => now(),
            'updated_at' => now(),       
        ]);
        DB::table('conditions')->insert([
            'condition' => 'Bangunan Modern',
            'created_at' => now(),
            'updated_at' => now(),       
        ]);
        DB::table('conditions')->insert([
            'condition' => 'Lebih dari 1 Lantai',
            'created_at' => now(),
            'updated_at' => now(),  
        ]);
    }
}
