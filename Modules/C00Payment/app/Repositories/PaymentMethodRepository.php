<?php

namespace Modules\C00Payment\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\C00Payment\Interfaces\PaymentMethodRepositoryInterface;
use Modules\C00Payment\Models\PaymentMethod;

class PaymentMethodRepository implements PaymentMethodRepositoryInterface
{
    public function index(): Collection
    {
        return PaymentMethod::all();
    }

    public function getById($id): PaymentMethod
    {
        return PaymentMethod::findOrFail($id);
    }

    public function store(array $data): PaymentMethod
    {
        return PaymentMethod::create($data);
    }

    public function update(array $data, $id): mixed
    {
        return PaymentMethod::whereId($id)->update($data);
    }

    public function delete($id): int
    {
        return PaymentMethod::destroy($id);
    }
}
