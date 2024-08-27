<?php

namespace Modules\E00Event\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Modules\E00Event\Models\EventType;

interface EventTypeRepositoryInterface
{
    public function index(): Collection;
    public function getById($id): EventType;
    public function store(array $data): EventType;
    public function update(array $data, $id): mixed;
    public function delete($id): int;
}
