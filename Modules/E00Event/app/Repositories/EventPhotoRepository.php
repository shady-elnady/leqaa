<?php

namespace Modules\E00Event\Repositories;

class EventPhotoRepository implements EventRepositoryInterface
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
