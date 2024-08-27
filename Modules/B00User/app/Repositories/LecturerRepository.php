<?php

namespace Modules\B00User\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\B00User\Interfaces\LecturerRepositoryInterface;
use Modules\B00User\Models\Lecturer;

class LecturerRepository implements LecturerRepositoryInterface
{
    public function index(): Collection
    {
        return Lecturer::all();
    }

    public function getById($id): Lecturer
    {
        return Lecturer::findOrFail($id);
    }

    public function store(array $data): Lecturer
    {
        return Lecturer::create($data);
    }

    public function update(array $data, $id): mixed
    {
        return Lecturer::whereId($id)->update($data);
    }

    public function delete($id): int
    {
        return Lecturer::destroy($id);
    }
}
