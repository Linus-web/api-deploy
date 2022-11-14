<?php

namespace App\Http\Resources;

use App\Models\Guild;
use Illuminate\Http\Resources\Json\JsonResource;

class PlayerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $guilds = Guild::where('id', '=', $this->guild_id)->get();
        $guild = $guilds[0]->guild_name;
        return [
            'id' => $this->id,
            'username' => $this->username,
            'guildName' => $guild,
            'inventories' => InventoryResource::collection($this->whenLoaded('inventories'))
        ];
    }
}
