<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArmorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('armors')->insert([
            'item_name' => 'cloth armor',
            'base_lvl' => 1
        ]);
        
        DB::table('armors')->insert([
            'item_name' => 'leather armor',
            'base_lvl' => 1
        ]);
        
        DB::table('armors')->insert([
            'item_name' => 'plate armor',
            'base_lvl' => 1
        ]);
    }
}
