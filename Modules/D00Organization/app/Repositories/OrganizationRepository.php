<?php

namespace Modules\D00Organization\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\D00Organization\Interfaces\OrganizationRepositoryInterface;
use Modules\D00Organization\Models\Organization;

class OrganizationRepository implements OrganizationRepositoryInterface
{
    public function index(): Collection
    {
        return Organization::all();
    }

    public function getById($id): Organization
    {
        return Organization::findOrFail($id);
    }

    public function store(array $data): Organization
    {
        return Organization::create($data);
    }

    public function update(array $data, $id): mixed
    {
        return Organization::whereId($id)->update($data);
    }

    public function delete($id): int
    {
        return Organization::destroy($id);
    }
}
