<?php

namespace App\Repositories\Eloquent;

use App\Exceptions\RepositoryException;
use App\Models\Event;
use App\Repositories\Contracts\EventRepositoryInterface;
use Illuminate\Http\Response;

class EventRepository implements EventRepositoryInterface
{
    private $model;

    public function __construct(Event $event)
    {
        $this->model = $event;
    }

    public function findAll()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        $event = $this->model->find($id);

        if (!$event)
            throw new RepositoryException('Event not found!', Response::HTTP_NOT_FOUND);

        return $event;
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
            $event = $this->find($id);
            $event->update($data);

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

            return ['message' => 'Event successfully deleted!'];
        } catch (\Exception $e) {
            throw new RepositoryException($e->getMessage() ?? 'There was a problem trying to destroy this register!', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
