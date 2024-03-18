<?php

namespace App\Http\Controllers;

use App\Http\Requests\Team\{CreateRequest, ShowRequest, UpdateRequest};
use App\Http\Resources\TeamResource;
use App\Models\Team;
use App\Repositories\Contracts\TeamRepositoryInterface;
use Illuminate\Http\Response;

class TeamController extends Controller
{
    private $teamRepository;

    public function __construct(TeamRepositoryInterface $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response(TeamResource::collection($this->teamRepository->findAll()), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(CreateRequest $request)
    {
        return response(TeamResource::make($this->teamRepository->create($request->validated())), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowRequest $request)
    {
        return response(TeamResource::make($this->teamRepository->find($request->validated('team_id'))), Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request)
    {
        return response(TeamResource::make($this->teamRepository->update($request->validated('team_id'), $request->validated())), Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(ShowRequest $request)
    {
        return response($this->teamRepository->delete($request['team_id']), Response::HTTP_OK);
    }
}
