<?php

namespace Modules\A00Contact\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Modules\A00Contact\Models\Street;

interface StreetRepositoryInterface
{
    public function index(): Collection;
    public function getById($id): Street;
    public function store(array $data): Street;
    public function update(array $data, $id): mixed;
    public function delete($id): int;
}
