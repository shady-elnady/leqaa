<?php

namespace Modules\E00Event\Interfaces;

use Modules\E00Event\Models\Event;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Collection;

interface  EventRepositoryInterface
{
    public function index(): Collection;
    public function getById($id): Event;
    public function store(array $data): Event;
    public function update(array $data, $id): mixed;
    public function delete($id): int;
}
