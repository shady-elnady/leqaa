<?php

namespace Modules\H00Chat\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Modules\H00Chat\Models\Room;

interface RoomRepositoryInterface
{
    public function index(): Collection;
    public function getById($id): Room;
    public function store(array $data): Room;
    public function update(array $data, $id): mixed;
    public function delete($id): int;
}
