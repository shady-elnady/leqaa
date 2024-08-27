<?php

namespace Modules\A00Contact\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\A00Contact\Interfaces\GovernorateRepositoryInterface;
use Modules\A00Contact\Models\Governorate;

class GovernorateRepository implements GovernorateRepositoryInterface
{
    public function index(): Collection
    {
        return Governorate::all();
    }

    public function getById($id): Governorate
    {
        return Governorate::findOrFail($id);
    }

    public function store(array $data): Governorate
    {
        return Governorate::create($data);
    }

    public function update(array $data, $id): mixed
    {
        return Governorate::whereId($id)->update($data);
    }

    public function delete($id): int
    {
        return Governorate::destroy($id);
    }
}
