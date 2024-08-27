<?php

namespace Modules\D00Organization\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\D00Organization\Interfaces\OrganizationTypeRepositoryInterface;
use Modules\D00Organization\Models\OrganizationType;

class OrganizationTypeRepository implements OrganizationTypeRepositoryInterface
{
    public function index(): Collection
    {
        return OrganizationType::all();
    }

    public function getById($id): OrganizationType
    {
        return OrganizationType::findOrFail($id);
    }

    public function store(array $data): OrganizationType
    {
        return OrganizationType::create($data);
    }

    public function update(array $data, $id): mixed
    {
        return OrganizationType::whereId($id)->update($data);
    }

    public function delete($id): int
    {
        return OrganizationType::destroy($id);
    }
}
