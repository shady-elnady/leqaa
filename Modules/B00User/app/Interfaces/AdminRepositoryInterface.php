<?php

namespace Modules\B00User\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Modules\B00User\Models\Admin;

interface AdminRepositoryInterface
{
    public function index(): Collection;
    public function getById($id): Admin;
    public function store(array $data): Admin;
    public function update(array $data, $id): mixed;
    public function delete($id): int;
}
