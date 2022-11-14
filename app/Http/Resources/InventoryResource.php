<?php

namespace App\Http\Resources;

use App\Models\Item;
use Illuminate\Http\Resources\Json\JsonResource;

class InventoryResource extends JsonResource
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
            'id' => $this->id,
            'inventoryName' => $this->inventory_name,
            'playerId' => $this->player_id,
            'guildId' => $this->guild_id,
            'inventoryMaxSize' => $this->inventory_max_size,
            'items' => ItemResource::collection($this->whenLoaded('items'))
        ];
    }
}
