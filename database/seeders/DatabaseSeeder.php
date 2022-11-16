<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Guild;
use App\Models\Inventory;
use App\Models\Item;
use App\Models\Player;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            ArmorSeeder::class,
            JewellerySeeder::class,
            WeaponSweeder::class
        ]);

       

        // User::factory()
        // ->count(100)
        // ->has(
        //     Player::factory()
        //     ->count(random_int(1,3))
        //     ->has(Inventory::factory(1)->has(Item::factory(5)))
        // )
        // ->create();

        // Guild::factory()
        // ->count(4)
        // ->create();
        


        

       

        // Guild::factory()
        // ->count(25)
        // ->has(Inventory::factory(1)->has(Item::factory(10)))
        // ->has(
        //     Player::factory(random_int(10,30))
        //     ->has(Inventory::factory(1)->has(Item::factory(5)))
        //     )
        // ->create();

    }
}
