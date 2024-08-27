<?php

namespace Modules\C00Payment\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\C00Payment\Interfaces\TransactionRepositoryInterface;
use Modules\C00Payment\Models\Transaction;

class TransactionRepository implements TransactionRepositoryInterface
{
    public function index(): Collection
    {
        return Transaction::all();
    }

    public function getById($id): Transaction
    {
        return Transaction::findOrFail($id);
    }

    public function store(array $data): Transaction
    {
        return Transaction::create($data);
    }

    public function update(array $data, $id): mixed
    {
        return Transaction::whereId($id)->update($data);
    }

    public function delete($id): int
    {
        return Transaction::destroy($id);
    }
}
