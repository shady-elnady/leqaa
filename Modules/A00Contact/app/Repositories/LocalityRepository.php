<?php

namespace Modules\A00Contact\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\A00Contact\Interfaces\LocalityRepositoryInterface;
use Modules\A00Contact\Models\Locality;

class LocalityRepository implements LocalityRepositoryInterface
{
    public function index(): Collection
    {
        return Locality::all();
    }

    public function getById($id): Locality
    {
        return Locality::findOrFail($id);
    }

    public function store(array $data): Locality
    {
        return Locality::create($data);
    }

    public function update(array $data, $id): mixed
    {
        return Locality::whereId($id)->update($data);
    }

    public function delete($id): int
    {
        return Locality::destroy($id);
    }
}
