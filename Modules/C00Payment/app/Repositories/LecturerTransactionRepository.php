<?php

namespace Modules\C00Payment\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\C00Payment\Interfaces\LecturerTransactionRepositoryInterface;
use Modules\C00Payment\Models\LecturerTransaction;

class LecturerTransactionRepository implements LecturerTransactionRepositoryInterface
{
    public function index(): Collection
    {
        return LecturerTransaction::all();
    }

    public function getById($id): LecturerTransaction
    {
        return LecturerTransaction::findOrFail($id);
    }

    public function store(array $data): LecturerTransaction
    {
        return LecturerTransaction::create($data);
    }

    public function update(array $data, $id): mixed
    {
        return LecturerTransaction::whereId($id)->update($data);
    }

    public function delete($id): int
    {
        return LecturerTransaction::destroy($id);
    }
}
