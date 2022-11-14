<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGuildRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {

        $method = $this->method();

        if($method=="put"){
   
            return [
                'guildName' => ['required', 'unique:guilds,guild_name'],
                'allianceID' => ['required', 'integer']
            ];
        } else{
            return [
                'guildName' => ['sometimes' ,'required','unique:guilds,guild_name' ],
                'allianceID' => ['sometimes', 'required', 'integer']
            ];
        }
    }

    protected function prepareForValidation(){
        $this->merge([
            'guild_name' => $this->guildName,
            'alliance_id' => $this->allianceID
        ]);
    }
}
