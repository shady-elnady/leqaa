<?php

namespace Modules\A00Contact\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Modules\A00Contact\Models\Country;

interface CountryRepositoryInterface
{
    public function index(): Collection;
    public function getById($id): Country;
    public function store(array $data): Country;
    public function update(array $data, $id): mixed;
    public function delete($id): int;
}
