<?php

namespace App\Repositories\Eloquent;

use App\Exceptions\RepositoryException;
use App\Models\Team;
use App\Repositories\Contracts\TeamRepositoryInterface;
use Illuminate\Http\Response;

class TeamRepository implements TeamRepositoryInterface
{
    private $model;

    public function __construct(Team $team)
    {
        $this->model = $team;
    }

    public function findAll()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        $team = $this->model->find($id);

        if (!$team)
            throw new RepositoryException('Team not found!', Response::HTTP_NOT_FOUND);

        return $team;
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
            $team = $this->find($id);
            $team->update($data);

            return $this->find($id);
        } catch (\Exception $e) {
            dd($e);
            throw new RepositoryException($e->getMessage() ?? 'There was a problem trying to update this register!', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function delete($id)
    {
        try {
            $this->find($id);
            $this->model->destroy($id);

            return ['message' => 'Team successfully deleted!'];
        } catch (\Exception $e) {
            throw new RepositoryException($e->getMessage() ?? 'There was a problem trying to destroy this register!', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
