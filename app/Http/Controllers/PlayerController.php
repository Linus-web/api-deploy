<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;
use App\Http\Resources\PlayerCollection;
use App\Http\Resources\PlayerResource;
use Illuminate\Database\Eloquent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        
        $includeInventories = $request->query('includeInventories');

        $players = Player::where('id', '>=', 0);

        if($includeInventories){
            $players = $players->with('inventories.items');
        }

        return new PlayerCollection($players->paginate());
        
    }

  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlayerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlayerRequest $request)
    {
        Player::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        $userId = auth()->user()->id;
        $player = $player::where('id', '=' , $userId)->get();        
        return new PlayerResource($player->loadMissing('inventories.items'));
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlayerRequest  $request
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlayerRequest $request)
    {
        
        $player = Player::where('user_id','=',Auth()->user()->id)->first();
        $player->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        $player->delete($player);
    }
}
