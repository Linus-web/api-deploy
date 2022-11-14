<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guild>
 */
class GuildFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'guild_name' => $this->faker->company(),
            'inventory_amount' => $this->faker->numberBetween(1,4),
            'alliance_id' => null,
            'leader_id' => User::all()->random()->id


        ];
    }
}
