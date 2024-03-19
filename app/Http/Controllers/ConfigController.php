<?php

namespace App\Http\Controllers;

use App\Http\Requests\Config\{CreateRequest, ShowRequest, UpdateRequest};
use App\Http\Resources\ConfigResource;
use App\Repositories\Contracts\ConfigRepositoryInterface;
use Illuminate\Http\Response;

class ConfigController extends Controller
{
    private $configRepository;

    public function __construct(ConfigRepositoryInterface $configRepository)
    {
        $this->configRepository = $configRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response(ConfigResource::collection($this->configRepository->findAll()), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(CreateRequest $request)
    {
        return response(ConfigResource::make($this->configRepository->create($request->validated())), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowRequest $request)
    {
        return response(ConfigResource::make($this->configRepository->find($request->validated('config_id'))), Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request)
    {
        return response(ConfigResource::make($this->configRepository->update($request->validated('config_id'), $request->validated())), Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(ShowRequest $request)
    {
        return response($this->configRepository->delete($request['config_id']), Response::HTTP_OK);
    }
}
