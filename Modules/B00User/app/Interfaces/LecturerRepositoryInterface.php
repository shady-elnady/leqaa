<?php

namespace Modules\B00User\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Modules\B00User\Models\Lecturer;

interface LecturerRepositoryInterface
{
    public function index(): Collection;
    public function getById($id): Lecturer;
    public function store(array $data): Lecturer;
    public function update(array $data, $id): mixed;
    public function delete($id): int;
}
