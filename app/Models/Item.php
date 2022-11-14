<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public function inventories(){
        return $this->belongsToMany(Inventory::class);
    }

    public function Armors(){
        return $this->hasOne(Armor::class);
    }

    
    public function Weapons(){
        return $this->hasOne(Weapon::class);
    }

    
    public function Jewelleries(){
        return $this->hasOne(Jewellery::class);
    }

    
    public function Requirements(){
        return $this->hasOne(Requirement::class);
    }

    protected $fillable = [
        'armor_id',
        'weapon_id',
        'jewellery_id',
    ];
}
