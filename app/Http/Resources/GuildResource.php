<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GuildResource extends JsonResource
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
            'guildName' => $this->guild_name,
            'inventories' => InventoryResource::collection($this->whenLoaded('inventories')),
            'players' =>  PlayerResource::collection($this->whenLoaded('players'))

        ];
    }
}
