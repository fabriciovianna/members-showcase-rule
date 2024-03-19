<?php

namespace App\Repositories\Eloquent;

use App\Exceptions\RepositoryException;
use App\Models\Preference;
use App\Repositories\Contracts\PreferenceRepositoryInterface;
use Illuminate\Http\Response;

class PreferenceRepository implements PreferenceRepositoryInterface
{
    private $model;

    public function __construct(Preference $preference)
    {
        $this->model = $preference;
    }

    public function findAll()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        $preference = $this->model->find($id);

        if (!$preference)
            throw new RepositoryException('Preference not found!', Response::HTTP_NOT_FOUND);

        return $preference;
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
            $preference = $this->find($id);
            $preference->update($data);

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

            return ['message' => 'Preference successfully deleted!'];
        } catch (\Exception $e) {
            throw new RepositoryException($e->getMessage() ?? 'There was a problem trying to destroy this register!', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
