<?php

namespace App\Http\Controllers;

use App\Http\Requests\Team\ShowRequest;
use App\Http\Requests\Team\StoreRequest;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response(TeamResource::collection(Team::all()), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        return response(TeamResource::make(Team::create($request->validated())), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowRequest $teamId)
    {
        return response(TeamResource::make(Team::find($teamId)), Response::HTTP_OK);
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
        Team::remove($team);
        return response([], Response::HTTP_NO_CONTENT);
    }
}
