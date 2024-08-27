<?php

namespace Modules\H00Chat\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Modules\H00Chat\Models\Message;

interface MessageRepositoryInterface
{
    public function index(): Collection;
    public function getById($id): Message;
    public function store(array $data): Message;
    public function update(array $data, $id): mixed;
    public function delete($id): int;
}
