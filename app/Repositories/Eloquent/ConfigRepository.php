<?php

namespace App\Repositories\Eloquent;

use App\Exceptions\RepositoryException;
use App\Models\Config;
use App\Repositories\Contracts\ConfigRepositoryInterface;
use Illuminate\Http\Response;

class ConfigRepository implements ConfigRepositoryInterface
{
    private $model;

    public function __construct(Config $config)
    {
        $this->model = $config;
    }

    public function findAll()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        $config = $this->model->find($id);

        if (!$config)
            throw new RepositoryException('Config not found!', Response::HTTP_NOT_FOUND);

        return $config;
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
            $config = $this->find($id);
            $config->update($data);

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

            return ['message' => 'Config successfully deleted!'];
        } catch (\Exception $e) {
            throw new RepositoryException($e->getMessage() ?? 'There was a problem trying to destroy this register!', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
