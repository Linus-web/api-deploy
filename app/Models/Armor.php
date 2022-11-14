<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Armor extends Model
{
    use HasFactory;
    
    public function Items(){
        return $this->belongsToMany(Item::class);
    }

}
