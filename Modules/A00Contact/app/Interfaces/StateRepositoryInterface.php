<?php

namespace Modules\A00Contact\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Modules\A00Contact\Models\State;

interface StateRepositoryInterface
{
    public function index(): Collection;
    public function getById($id): State;
    public function store(array $data): State;
    public function update(array $data, $id): mixed;
    public function delete($id): int;
}
