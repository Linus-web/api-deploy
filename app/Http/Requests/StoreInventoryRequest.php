<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInventoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'playerId' => ['required_without:guildId', 'integer', 'prohibits:guildId'],
            'guildId' => ['required_without:playerId', 'integer', 'prohibits:playerId']
        ];
    }
    protected function prepareForValidation(){
        $this->merge([
            'guild_id' => $this->guildId,
            'player_id' => $this->playerId
        ]);
    }
}
