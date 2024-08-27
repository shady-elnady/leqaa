<?php

namespace Modules\D00Organization\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\D00Organization\Interfaces\CollegeRepositoryInterface;
use Modules\D00Organization\Models\College;

class CollegeRepository implements CollegeRepositoryInterface
{
    public function index(): Collection
    {
        return College::all();
    }

    public function getById($id): College
    {
        return College::findOrFail($id);
    }

    public function store(array $data): College
    {
        return College::create($data);
    }

    public function update(array $data, $id): mixed
    {
        return College::whereId($id)->update($data);
    }

    public function delete($id): int
    {
        return College::destroy($id);
    }
}
