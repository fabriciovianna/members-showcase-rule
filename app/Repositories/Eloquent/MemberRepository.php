<?php

namespace App\Repositories\Eloquent;

use App\Exceptions\RepositoryException;
use App\Models\Member;
use App\Repositories\Contracts\MemberRepositoryInterface;
use Illuminate\Http\Response;

class MemberRepository implements MemberRepositoryInterface
{
    private $model;

    public function __construct(Member $member)
    {
        $this->model = $member;
    }

    public function findAll()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        $member = $this->model->find($id);

        if (!$member)
            throw new RepositoryException('Member not found!', Response::HTTP_NOT_FOUND);

        return $member;
    }

    public function create($data = null)
    {
        try {
            return $this->model->create($data);
        } catch (\Exception $e) {
            throw new RepositoryException($e->getMessage() ?? 'There was a problem trying to create this register!', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update($id, $data = null)
    {
        try {
            $member = $this->find($id);
            $member->update($data);

            return $this->find($id);
        } catch (\Exception $e) {
            throw new RepositoryException($e->getMessage() ?? 'There was a problem trying to update this register!', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function delete($id)
    {
        try {
            $this->find($id);
            $this->model->destroy($id);

            return ['message' => 'Member successfully deleted!'];
        } catch (\Exception $e) {
            throw new RepositoryException($e->getMessage() ?? 'There was a problem trying to destroy this register!', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
