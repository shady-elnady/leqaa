<?php

namespace Modules\H00Chat\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Modules\H00Chat\Models\MessageFile;

interface MessageFileRepositoryInterface
{
    public function index(): Collection;
    public function getById($id): MessageFile;
    public function store(array $data): MessageFile;
    public function update(array $data, $id): mixed;
    public function delete($id): int;
}
