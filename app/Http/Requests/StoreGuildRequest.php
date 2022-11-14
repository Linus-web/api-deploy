<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGuildRequest extends FormRequest
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
            'guildName' => ['required', 'unique:guilds,guild_name'],
            'leaderId' => ['required', 'unique:guilds,leader_id']
        ];
    }

    protected function prepareForValidation(){
        $this->merge([
            'guild_name' => $this->guildName,
            'leader_id' => $this->leaderId
        ]);
    }

}
