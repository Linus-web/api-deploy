<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInventoryRequest extends FormRequest
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
        $method = $this->method();

        if($method=="put"){
   
            return [
                'inventoryName' => ['required']
            ];
        } else{
            return [
                'inventoryName' => ['sometimes','required']
            ];
        }
    }

    protected function prepareForValidation(){
        $this->merge([
            'inventory_name' => $this->inventoryName
        ]);
    }
}
