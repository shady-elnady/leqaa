<?php

namespace Modules\C00Payment\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Modules\C00Payment\Models\LecturerTransaction;

interface LecturerTransactionRepositoryInterface
{
    public function index(): Collection;
    public function getById($id): LecturerTransaction;
    public function store(array $data): LecturerTransaction;
    public function update(array $data, $id): mixed;
    public function delete($id): int;
}
