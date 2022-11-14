<?php

namespace Database\Factories;

use App\Models\Armor;
use App\Models\Jewellery;
use App\Models\Requirement;
use App\Models\Weapon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */



    public function definition()
    {

        $random = random_int(1,3);


        if($random == 3){

            return [
                'armor_id' => Armor::all()->random()->id,
            ];
        }else if($random ==2){
            return [
                'weapon_id' => Weapon::all()->random()->id
            ];
        }
        else{
            return [
                'jewellery_id' => Jewellery::all()->random()->id
            ];
        }

    }
}
