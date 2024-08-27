<?php

namespace Modules\B00User\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Modules\B00User\Models\Student;

interface StudentRepositoryInterface
{
    public function index(): Collection;
    public function getById($id): Student;
    public function store(array $data): Student;
    public function update(array $data, $id): mixed;
    public function delete($id): int;
}
