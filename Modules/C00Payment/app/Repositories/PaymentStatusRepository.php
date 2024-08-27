<?php

namespace Modules\C00Payment\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\C00Payment\Interfaces\PaymentStatusRepositoryInterface;
use Modules\C00Payment\Models\PaymentStatus;

class PaymentStatusRepository implements PaymentStatusRepositoryInterface
{
    public function index(): Collection
    {
        return PaymentStatus::all();
    }

    public function getById($id): PaymentStatus
    {
        return PaymentStatus::findOrFail($id);
    }

    public function store(array $data): PaymentStatus
    {
        return PaymentStatus::create($data);
    }

    public function update(array $data, $id): mixed
    {
        return PaymentStatus::whereId($id)->update($data);
    }

    public function delete($id): int
    {
        return PaymentStatus::destroy($id);
    }
}
