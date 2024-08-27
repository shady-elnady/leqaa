<?php

namespace Modules\A00Contact\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\A00Contact\Interfaces\CountryRepositoryInterface;
use Modules\A00Contact\Models\Country;

class CountryRepository implements CountryRepositoryInterface
{
    public function index(): Collection
    {
        return Country::all();
    }

    public function getById($id): Country
    {
        return Country::findOrFail($id);
    }

    public function store(array $data): Country
    {
        return Country::create($data);
    }

    public function update(array $data, $id): mixed
    {
        return Country::whereId($id)->update($data);
    }

    public function delete($id): int
    {
        return Country::destroy($id);
    }
}
