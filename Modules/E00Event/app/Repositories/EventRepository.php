<?php

namespace Modules\E00Event\Repositories;

use Modules\E00Event\Interfaces\EventRepositoryInterface;
use Modules\E00Event\Models\Event;
use Illuminate\Database\Eloquent\Collection;

class EventRepository implements EventRepositoryInterface
{
    public function index(): Collection
    {
        return Event::all();
    }

    public function getById($id): Event
    {
        return Event::findOrFail($id);
    }

    public function store(array $data): Event
    {
        return Event::create($data);
    }

    public function update(array $data, $id): mixed
    {
        return Event::whereId($id)->update($data);
    }

    public function delete($id): int
    {
        return Event::destroy($id);
    }
}
