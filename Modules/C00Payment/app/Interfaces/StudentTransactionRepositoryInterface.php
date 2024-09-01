<?php

namespace Modules\C00Payment\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Modules\C00Payment\Models\StudentTransaction;

interface StudentTransactionRepositoryInterface
{
    public function index(): Collection;
    public function getById($id): StudentTransaction;
    public function store(array $data): StudentTransaction;
    public function update(array $data, $id): mixed;
    public function delete($id): int;
}
