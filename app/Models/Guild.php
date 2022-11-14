<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guild extends Model
{
    use HasFactory;

    public function players(){
        return $this->hasMany(Player::class);
    }

    public function guildLeader(){
        return $this->belongsTo(Player::class);
    }

    public function inventories(){
        return $this->hasMany(Inventory::class);
    }

    protected $attributes = [
        'inventory_amount' => 1,
        'alliance_id' => 0,
    ];

    protected $fillable = [
        'guild_name',
        'inventory_amount',
        'alliance_id',
        'leader_id'
    ];


   

}
