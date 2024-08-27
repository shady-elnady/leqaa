<?php

namespace Modules\D00Organization\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Modules\D00Organization\Models\University;

interface UniversityRepositoryInterface
{
    public function index(): Collection;
    public function getById($id): University;
    public function store(array $data): University;
    public function update(array $data, $id): mixed;
    public function delete($id): int;
}
