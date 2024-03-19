<?php

namespace App\Http\Controllers;

use App\Http\Requests\Preference\{CreateRequest, ShowRequest, UpdateRequest};
use App\Http\Resources\PreferenceResource;
use App\Repositories\Contracts\PreferenceRepositoryInterface;
use Illuminate\Http\Response;

class PreferenceController extends Controller
{
    private $preferenceRepository;

    public function __construct(PreferenceRepositoryInterface $preferenceRepository)
    {
        $this->preferenceRepository = $preferenceRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response(PreferenceResource::collection($this->preferenceRepository->findAll()), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(CreateRequest $request)
    {
        return response(PreferenceResource::make($this->preferenceRepository->create($request->validated())), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowRequest $request)
    {
        return response(PreferenceResource::make($this->preferenceRepository->find($request->validated('preference_id'))), Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request)
    {
        return response(PreferenceResource::make($this->preferenceRepository->update($request->validated('preference_id'), $request->validated())), Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(ShowRequest $request)
    {
        return response($this->preferenceRepository->delete($request['preference_id']), Response::HTTP_OK);
    }
}
