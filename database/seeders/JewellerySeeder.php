<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JewellerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jewelleries')->insert([
            'item_name' => 'ruby ring',
            'base_lvl' => 1
        ]);
        
        DB::table('jewelleries')->insert([
            'item_name' => 'sapphire ring',
            'base_lvl' => 1
        ]);
        
        DB::table('jewelleries')->insert([
            'item_name' => 'topaz ring',
            'base_lvl' => 1
        ]);

        DB::table('jewelleries')->insert([
            'item_name' => 'amber amulet',
            'base_lvl' => 5
        ]);
        
        DB::table('jewelleries')->insert([
            'item_name' => 'lapis amulet',
            'base_lvl' => 5
        ]);
        
        DB::table('jewelleries')->insert([
            'item_name' => 'jade amulet',
            'base_lvl' => 5
        ]);
    }
}
