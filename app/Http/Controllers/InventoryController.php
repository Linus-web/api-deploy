<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Http\Requests\StoreInventoryRequest;
use App\Http\Requests\UpdateInventoryRequest;
use App\Http\Resources\InventoryCollection;
use App\Http\Resources\InventoryResource;
use App\Models\Guild;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventory = Inventory::select();

        $inventory = $inventory->with('items');

        return new InventoryCollection($inventory->paginate());
    }

 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInventoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInventoryRequest $request)
    {
        $array = $request->all();
        if(array_key_exists('guild_id', $array)){
            if(count(Inventory::where('guild_id','=', $array['guild_id'] )->get())<1)
            return new InventoryResource(Inventory::create($request->all()));
            else
            return 'guild already has an inventory';
        }elseif(array_key_exists('player_id', $array)){
            if(count(Inventory::where('player_id','=', $array['player_id'] )->get())<1)
            return new InventoryResource(Inventory::create($request->all()));
            else
            return 'player already has an inventory';
        }else{
            return ' needs to have guild or player parameter  ';
        }
        



        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $player = Player::where('user_id', '=',Auth()->user()->id)->first() ;
        $inventory = Inventory::where('player_id', '=', $player->id)->first();
        return new InventoryResource($inventory);
    }

  
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInventoryRequest  $request
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInventoryRequest $request, Inventory $inventory)
    {
        $inventory->update($request->except('guild_id', 'player_id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    
}
