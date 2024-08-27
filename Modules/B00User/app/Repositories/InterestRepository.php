<?php

namespace Modules\B00User\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\B00User\Interfaces\InterestRepositoryInterface;
use Modules\B00User\Models\Interest;

class InterestRepository implements InterestRepositoryInterface
{
    public function index(): Collection
    {
        return Interest::all();
    }

    public function getById($id): Interest
    {
        return Interest::findOrFail($id);
    }

    public function store(array $data): Interest
    {
        return Interest::create($data);
    }

    public function update(array $data, $id): mixed
    {
        return Interest::whereId($id)->update($data);
    }

    public function delete($id): int
    {
        return Interest::destroy($id);
    }
}
