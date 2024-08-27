<?php

namespace Modules\A00Contact\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Modules\A00Contact\Models\Address;

interface AddressRepositoryInterface
{
    public function index(): Collection;
    public function getById($id): Address;
    public function store(array $data): Address;
    public function update(array $data, $id): mixed;
    public function delete($id): int;
}
