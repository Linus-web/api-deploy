<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{

    public function guilds(){
        return $this->belongsTo(Guild::class);
    }

    public function players(){
        return $this->belongsTo(Player::class);
    }

    public function items(){
        return $this->hasMany(Item::class);
    }

    protected $attributes = [
        'inventory_name' => 'tab',
        'inventory_max_size' => 64,
        'player_id' => null,
        'guild_id' => null,
    ];

    protected $fillable = [
        'inventory_name',
        'player_id',
        'guild_id',
    ];

    use HasFactory;
}
