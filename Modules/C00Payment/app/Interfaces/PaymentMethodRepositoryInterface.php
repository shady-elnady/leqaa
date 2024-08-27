<?php

namespace Modules\C00Payment\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Modules\C00Payment\Models\PaymentMethod;

interface PaymentMethodRepositoryInterface
{
    public function index(): Collection;
    public function getById($id): PaymentMethod;
    public function store(array $data): PaymentMethod;
    public function update(array $data, $id): mixed;
    public function delete($id): int;
}
