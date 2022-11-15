<?php

namespace App\Http\Requests;

use App\Models\Player;
use Illuminate\Foundation\Http\FormRequest;

class StoreInventoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this this$this.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the this$this.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        $guildInv = $this->query('guild');
        $playerInv = $this->query('player');
        $userId = Auth()->user()->id;
        $player = Player::where('user_id', '=', $userId)->first();
        if($guildInv){
            $this->merge([
                'guild_id' => $player->guild->id
            ]);
        }elseif($playerInv){
            $this->merge([
                'player_id' => $player->id
            ]);
        }else{
        }

        return [];
      
    }

}
