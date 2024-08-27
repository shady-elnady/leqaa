<?php

namespace Modules\H00Chat\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\H00Chat\Interfaces\RoomRepositoryInterface;
use Modules\H00Chat\Models\Room;

class RoomRepository implements RoomRepositoryInterface
{
    public function index(): Collection
    {
        return Room::all();
    }

    public function getById($id): Room
    {
        return Room::findOrFail($id);
    }

    public function store(array $data): Room
    {
        return Room::create($data);
    }

    public function update(array $data, $id): mixed
    {
        return Room::whereId($id)->update($data);
    }

    public function delete($id): int
    {
        return Room::destroy($id);
    }
}
