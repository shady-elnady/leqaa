<?php

namespace Modules\D00Organization\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Modules\D00Organization\Models\Organization;

interface OrganizationRepositoryInterface
{
    public function index(): Collection;
    public function getById($id): Organization;
    public function store(array $data): Organization;
    public function update(array $data, $id): mixed;
    public function delete($id): int;
}
