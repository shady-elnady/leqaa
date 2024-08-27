<?php

namespace Modules\C00Payment\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Modules\C00Payment\Models\Transaction;

interface TransactionRepositoryInterface
{
    public function index(): Collection;
    public function getById($id): Transaction;
    public function store(array $data): Transaction;
    public function update(array $data, $id): mixed;
    public function delete($id): int;
}
