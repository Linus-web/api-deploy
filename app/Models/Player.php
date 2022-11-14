<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;


    public function guild(){
        return $this->hasOne(Guild::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function inventories(){
        return $this->hasMany(Inventory::class);
    }

    protected $fillable = [
        'username',
        'guild_id',
        'user_id'
    ];
}
