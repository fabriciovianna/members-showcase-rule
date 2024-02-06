<?php

namespace App\Http\Controllers;

use App\Http\Requests\Team\StoreRequest;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TeamResource::collection(Team::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return TeamResource::collection(Team::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        //
    }
}
