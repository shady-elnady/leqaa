<?php

namespace Modules\E00Event\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Modules\E00Event\Models\EventPhoto;

interface EventPhotoRepositoryInterface
{
    public function index(): Collection;
    public function getById($id): EventPhoto;
    public function store(array $data): EventPhoto;
    public function update(array $data, $id): mixed;
    public function delete($id): int;
}
