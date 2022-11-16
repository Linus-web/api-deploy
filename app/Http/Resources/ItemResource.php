<?php

namespace App\Http\Resources;

use App\Models\Armor;
use App\Models\Jewellery;
use App\Models\Weapon;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {   

        $item = null;


        // dd(Armor::where('id', $this->armor_id)->get(['base_lvl', 'item_name']));
            if($this->armor_id!=null){
                $item = Armor::where('id', $this->armor_id)->get(['base_lvl', 'item_name']);
            }else if($this->weapon_id!=null){
                $item =  Weapon::where('id', $this->weapon_id)->get(['base_lvl', 'item_name']);
            }else if($this->jewellery_id!=null){
                $item = Jewellery::where('id' , $this->jewellery_id)->get(['base_lvl', 'item_name']);
            }

        return [
            'itemId' => $this->id,
            'itemInfo' => ItemInfoResource::collection($item)
            
        ];
    }
}
