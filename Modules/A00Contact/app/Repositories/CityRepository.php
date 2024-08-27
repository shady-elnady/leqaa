<?php

namespace Modules\A00Contact\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\A00Contact\Interfaces\CityRepositoryInterface;
use Modules\A00Contact\Models\City;

class CityRepository implements CityRepositoryInterface
{
    public function index(): Collection
    {
        return City::all();
    }

    public function getById($id): City
    {
        return City::findOrFail($id);
    }

    public function store(array $data): City
    {
        return City::create($data);
    }

    public function update(array $data, $id): mixed
    {
        return City::whereId($id)->update($data);
    }

    public function delete($id): int
    {
        return City::destroy($id);
    }
}
