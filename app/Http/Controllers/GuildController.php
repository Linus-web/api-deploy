<?php

namespace App\Http\Controllers;

use App\Models\Guild;
use App\Http\Requests\StoreGuildRequest;
use App\Http\Requests\UpdateGuildRequest;
use App\Http\Resources\GuildCollection;
use App\Http\Resources\GuildResource;
use App\Models\Inventory;
use App\Models\Player;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $includeInventories = $request->query('includeInventories');
        $includePlayers = $request->query('includePlayers');

        $guilds = Guild::select();

        if($includePlayers){
            $guilds = $guilds->with('players');
        }
        
        if($includeInventories){
            $guilds = $guilds->with('inventories.items');
        }

        return new GuildCollection($guilds->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGuildRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGuildRequest $request)
    {
        $user = Auth()->user();
        $player = Player::where('user_id','=',$user->id)->get();
        $player = $player[0];
        $request->merge([
            'leader_id' => $player->id
        ]);
        Guild::create($request->all());
        Player::where('user_id','=',$user->id)->update([
            'guild_id'=> Guild::where('guild_name','=', $request->guild_name)->first()->id,
        ]);
        Inventory::create([
            'guild_id' => Guild::where('guild_name','=', $request->guild_name)->first()->id,
        ]);

        


        return 'guild created successfully';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guild  $guild
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $player =  Player::where('user_id', '=', Auth()->user()->id)->get();
        $player = $player[0];
        $guild = $player->guild;
        return new GuildResource($guild->loadMissing(['players', 'inventories.items']));
    }

  
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGuildRequest  $request
     * @param  \App\Models\Guild  $guild
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGuildRequest $request, Guild $guild)
    {
       $guild->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guild  $guild
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guild $guild)
    {
        $guild->delete($guild);
    }
}
