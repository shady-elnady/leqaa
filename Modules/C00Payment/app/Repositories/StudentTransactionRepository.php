<?php

namespace Modules\C00Payment\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\C00Payment\Interfaces\StudentTransactionRepositoryInterface;
use Modules\C00Payment\Models\StudentTransaction;

class StudentTransactionRepository implements StudentTransactionRepositoryInterface
{
    public function index(): Collection
    {
        return StudentTransaction::all();
    }

    public function getById($id): StudentTransaction
    {
        return StudentTransaction::findOrFail($id);
    }

    public function store(array $data): StudentTransaction
    {
        return StudentTransaction::create($data);
    }

    public function update(array $data, $id): mixed
    {
        return StudentTransaction::whereId($id)->update($data);
    }

    public function delete($id): int
    {
        return StudentTransaction::destroy($id);
    }
}
