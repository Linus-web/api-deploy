<?php

namespace App\Http\Controllers;

use App\Models\Alliance;
use App\Http\Requests\StoreAllianceRequest;
use App\Http\Requests\UpdateAllianceRequest;

class AllianceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAllianceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAllianceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alliance  $alliance
     * @return \Illuminate\Http\Response
     */
    public function show(Alliance $alliance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alliance  $alliance
     * @return \Illuminate\Http\Response
     */
    public function edit(Alliance $alliance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAllianceRequest  $request
     * @param  \App\Models\Alliance  $alliance
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAllianceRequest $request, Alliance $alliance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alliance  $alliance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alliance $alliance)
    {
        //
    }
}
