<?php

namespace App\Interfaces;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

interface CategoryRepositoryInterface
{
    public function index(): Collection;
    public function getById($id): Category;
    public function store(array $data): Category;
    public function update(array $data, $id): mixed;
    public function delete($id): int;
}
