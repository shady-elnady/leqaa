<?php

namespace Modules\D00Organization\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\D00Organization\Interfaces\UniversityRepositoryInterface;
use Modules\D00Organization\Models\University;

class UniversityRepository implements UniversityRepositoryInterface
{
    public function index(): Collection
    {
        return University::all();
    }

    public function getById($id): University
    {
        return University::findOrFail($id);
    }

    public function store(array $data): University
    {
        return University::create($data);
    }

    public function update(array $data, $id): mixed
    {
        return University::whereId($id)->update($data);
    }

    public function delete($id): int
    {
        return University::destroy($id);
    }
}
