<?php

namespace App\Http\Resources;

use App\Models\Player;
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
        $leader = Player::where('id','=', $this->leader_id)->get();
        return [
            'id' => $this->id,
            'guildLeader'=> $leader[0]->username,
            'guildName' => $this->guild_name,
            'inventories' => InventoryResource::collection($this->whenLoaded('inventories')),
            'players' =>  PlayerResource::collection($this->whenLoaded('players'))

        ];
    }
}
