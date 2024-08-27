<?php

namespace Modules\D00Organization\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Modules\D00Organization\Models\College;

interface CollegeRepositoryInterface
{
    public function index(): Collection;
    public function getById($id): College;
    public function store(array $data): College;
    public function update(array $data, $id): mixed;
    public function delete($id): int;
}
