<?php

namespace Modules\A00Contact\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Modules\A00Contact\Models\Governorate;

interface GovernorateRepositoryInterface
{
    public function index(): Collection;
    public function getById($id): Governorate;
    public function store(array $data): Governorate;
    public function update(array $data, $id): mixed;
    public function delete($id): int;
}
