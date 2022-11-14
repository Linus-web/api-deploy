<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jewellery extends Model
{

    public function Items(){
        return $this->belongsToMany(Item::class);
    }

    use HasFactory;
}
