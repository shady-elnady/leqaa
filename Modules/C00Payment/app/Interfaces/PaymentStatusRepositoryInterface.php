<?php

namespace Modules\C00Payment\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Modules\C00Payment\Models\PaymentStatus;

interface PaymentStatusRepositoryInterface
{
    public function index(): Collection;
    public function getById($id): PaymentStatus;
    public function store(array $data): PaymentStatus;
    public function update(array $data, $id): mixed;
    public function delete($id): int;
}
