<?php

namespace Modules\A00Contact\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Modules\A00Contact\Models\Locality;

interface LocalityRepositoryInterface
{
    public function index(): Collection;
    public function getById($id): Locality;
    public function store(array $data): Locality;
    public function update(array $data, $id): mixed;
    public function delete($id): int;
}
