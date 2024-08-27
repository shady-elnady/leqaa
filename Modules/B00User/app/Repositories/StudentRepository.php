<?php

namespace Modules\B00User\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\B00User\Interfaces\StudentRepositoryInterface;
use Modules\B00User\Models\Student;

class StudentRepository implements StudentRepositoryInterface
{
    public function index(): Collection
    {
        return Student::all();
    }

    public function getById($id): Student
    {
        return Student::findOrFail($id);
    }

    public function store(array $data): Student
    {
        return Student::create($data);
    }

    public function update(array $data, $id): mixed
    {
        return Student::whereId($id)->update($data);
    }

    public function delete($id): int
    {
        return Student::destroy($id);
    }
}
