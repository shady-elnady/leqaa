<?php

namespace Modules\D00Organization\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Modules\D00Organization\Models\OrganizationType;

interface OrganizationTypeRepositoryInterface
{
    public function index(): Collection;
    public function getById($id): OrganizationType;
    public function store(array $data): OrganizationType;
    public function update(array $data, $id): mixed;
    public function delete($id): int;
}
