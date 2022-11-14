<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeaponSweeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('weapons')->insert([
            'item_name' => 'curde bow',
            'base_lvl' => 1
        ]);
        
        DB::table('weapons')->insert([
            'item_name' => 'curde sword',
            'base_lvl' => 1
        ]);
        
        DB::table('weapons')->insert([
            'item_name' => 'curde dagger',
            'base_lvl' => 1
        ]);
    }
}
