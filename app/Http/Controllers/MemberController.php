<?php

namespace App\Http\Controllers;

use App\Http\Requests\Member\{CreateRequest, ShowRequest, UpdateRequest};
use App\Http\Resources\MemberResource;
use App\Repositories\Contracts\MemberRepositoryInterface;
use Illuminate\Http\Response;

class MemberController extends Controller
{

    private $memberRepository;

    public function __construct(MemberRepositoryInterface $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response(MemberResource::collection($this->memberRepository->findAll()), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(CreateRequest $request)
    {
        return response(MemberResource::make($this->memberRepository->create($request->validated())), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowRequest $request)
    {
        return response(MemberResource::make($this->memberRepository->find($request->validated('member_id'))), Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request)
    {
        return response(MemberResource::make($this->memberRepository->update($request->validated('member_id'), $request->validated())), Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(ShowRequest $request)
    {
        return response($this->memberRepository->delete($request['member_id']), Response::HTTP_OK);
    }
}
