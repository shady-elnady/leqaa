<?php

namespace Modules\A00Contact\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\A00Contact\Interfaces\StreetRepositoryInterface;
use Modules\A00Contact\Models\Street;

class StreetRepository implements StreetRepositoryInterface
{
    public function index(): Collection
    {
        return Street::all();
    }

    public function getById($id): Street
    {
        return Street::findOrFail($id);
    }

    public function store(array $data): Street
    {
        return Street::create($data);
    }

    public function update(array $data, $id): mixed
    {
        return Street::whereId($id)->update($data);
    }

    public function delete($id): int
    {
        return Street::destroy($id);
    }
}
