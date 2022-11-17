<?php

namespace App\Http\Requests;

use App\Models\Player;
use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
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

            'armorId' => ['required_without_all:weapon_id,jewellery_id','integer','prohibits:jewellery_id,weapon_id','nullable'],
            'weaponId' => ['required_without_all:armor_id,jewellery_id','integer','prohibits:armor_id,jewellery_id', 'nullable'],
            'jewelleryId' => ['required_without_all:armor_id,weapon_id','integer', 'prohibits:armor_id,weapon_id','nullable']
        ];

    }

    protected function prepareForValidation(){
        if($this->weaponId){
            $this->merge([
                'weapon_id' => $this->weaponId,
            ]);
        }
        if($this->armorId){
            $this->merge([
                'armor_id' => $this->armorId,
            ]);
        }
        if($this->jewelleryId){
            $this->merge([
                'jewellery_id' => $this->jewelleryId,
            ]);
        }

    }
}
