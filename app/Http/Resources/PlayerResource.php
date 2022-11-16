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
        $guild = Guild::where('id', '=', $this->guild_id)->first();
        if($guild){

            return [
                'id' => $this->id,
                'username' => $this->username,
                'guildName' => $guild->guild_name,
                'inventories' => InventoryResource::collection($this->whenLoaded('inventories'))
            ];
        }else{
            return [
                'id' => $this->id,
                'username' => $this->username,
                'inventories' => InventoryResource::collection($this->whenLoaded('inventories'))
            ];
        }
    }
}
