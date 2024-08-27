<?php

namespace Modules\B00User\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Modules\B00User\Models\Interest;

interface InterestRepositoryInterface
{
    public function index(): Collection;
    public function getById($id): Interest;
    public function store(array $data): Interest;
    public function update(array $data, $id): mixed;
    public function delete($id): int;
}
