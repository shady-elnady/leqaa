<?php

namespace App\Interfaces;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Collection;

interface CurrencyRepositoryInterface
{
    public function index(): Collection;
    public function getById($id): Currency;
    public function store(array $data): Currency;
    public function update(array $data, $id): mixed;
    public function delete($id): int;
}
