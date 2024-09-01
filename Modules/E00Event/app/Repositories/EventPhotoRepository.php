<?php

namespace Modules\E00Event\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\E00Event\Interfaces\EventPhotoRepositoryInterface;
use Modules\E00Event\Models\EventPhoto;

class EventPhotoRepository implements EventPhotoRepositoryInterface
{
    public function index(): Collection
    {
        return EventPhoto::all();
    }

    public function getById($id): EventPhoto
    {
        return EventPhoto::findOrFail($id);
    }

    public function store(array $data): EventPhoto
    {
        return EventPhoto::create($data);
    }

    public function update(array $data, $id): mixed
    {
        return EventPhoto::whereId($id)->update($data);
    }

    public function delete($id): int
    {
        return EventPhoto::destroy($id);
    }
}
