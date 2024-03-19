<?php

namespace App\Http\Controllers;

use App\Http\Requests\Event\{CreateRequest, ShowRequest, UpdateRequest};
use App\Http\Resources\EventResource;
use App\Repositories\Contracts\EventRepositoryInterface;
use Illuminate\Http\Response;

class EventController extends Controller
{
    private $eventRepository;

    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response(EventResource::collection($this->eventRepository->findAll()), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(CreateRequest $request)
    {
        return response(EventResource::make($this->eventRepository->create($request->validated())), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowRequest $request)
    {
        return response(EventResource::make($this->eventRepository->find($request->validated('event_id'))), Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request)
    {
        return response(EventResource::make($this->eventRepository->update($request->validated('event_id'), $request->validated())), Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(ShowRequest $request)
    {
        return response($this->eventRepository->delete($request['event_id']), Response::HTTP_OK);
    }
}
