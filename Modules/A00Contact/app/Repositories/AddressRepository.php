<?php

namespace Modules\A00Contact\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\A00Contact\Interfaces\AddressRepositoryInterface;
use Modules\A00Contact\Models\Address;

class AddressRepository implements AddressRepositoryInterface
{
    public function index(): Collection
    {
        return Address::all();
    }

    public function getById($id): Address
    {
        return Address::findOrFail($id);
    }

    public function store(array $data): Address
    {
        return Address::create($data);
    }

    public function update(array $data, $id): mixed
    {
        return Address::whereId($id)->update($data);
    }

    public function delete($id): int
    {
        return Address::destroy($id);
    }
}
