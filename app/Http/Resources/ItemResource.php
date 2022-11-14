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

        return [
            'itemInfo' => ItemInfoResource::collection($this->whenPivotLoaded('inventory_item', function(){

            if($this->armor_id!=null){
                return Armor::where('id', '=' , $this->armor_id)->get(['base_lvl', 'item_name']);
            }else if($this->weapon_id!=null){
                return Weapon::where('id', '=' , $this->weapon_id)->get(['base_lvl', 'item_name']);
            }else{
                return Jewellery::where('id', '=' , $this->jewellery_id)->get(['base_lvl', 'item_name']);
            }
            })
            )
        ];
    }
}
