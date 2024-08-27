<?php

namespace Modules\A00Contact\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Modules\A00Contact\Models\City;

interface CityRepositoryInterface
{
    public function index(): Collection;
    public function getById($id): City;
    public function store(array $data): City;
    public function update(array $data, $id): mixed;
    public function delete($id): int;
}
