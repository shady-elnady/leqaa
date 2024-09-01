<?php

namespace Modules\E00Event\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\E00Event\Interfaces\EventTypeRepositoryInterface;
use Modules\E00Event\Models\EventType;

class EventTypeRepository implements EventTypeRepositoryInterface
{
    public function index(): Collection
    {
        return EventType::all();
    }

    public function getById($id): EventType
    {
        return EventType::findOrFail($id);
    }

    public function store(array $data): EventType
    {
        return EventType::create($data);
    }

    public function update(array $data, $id): mixed
    {
        return EventType::whereId($id)->update($data);
    }

    public function delete($id): int
    {
        return EventType::destroy($id);
    }
}
