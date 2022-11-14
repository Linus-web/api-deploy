<?php

namespace App\Http\Controllers;

use App\Models\Guild;
use App\Http\Requests\StoreGuildRequest;
use App\Http\Requests\UpdateGuildRequest;
use App\Http\Resources\GuildCollection;
use App\Http\Resources\GuildResource;
use Illuminate\Http\Request;

class GuildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $includePlayersWithInventories = $request->query('includePlayersWithInventories');
        $includeInventories = $request->query('includeInventories');
        $includePlayers = $request->query('includePlayers');

        $guilds = Guild::select();

        if($includePlayers){
            $guilds = $guilds->with('players');
        }else if($includePlayersWithInventories){
            $guilds = $guilds->with('players.inventories.items');
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
        return new GuildResource(Guild::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guild  $guild
     * @return \Illuminate\Http\Response
     */
    public function show(Guild $guild)
    {
        $includePlayers = request()->query('includePlayers');
        if($includePlayers){
            return new GuildResource($guild->loadMissing('players'));
        }
        return new GuildResource($guild);
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
