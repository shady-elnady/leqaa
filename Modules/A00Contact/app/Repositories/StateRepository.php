<?php

namespace Modules\A00Contact\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\A00Contact\Interfaces\StateRepositoryInterface;
use Modules\A00Contact\Models\State;

class StateRepository implements StateRepositoryInterface
{
    public function index(): Collection
    {
        return State::all();
    }

    public function getById($id): State
    {
        return State::findOrFail($id);
    }

    public function store(array $data): State
    {
        return State::create($data);
    }

    public function update(array $data, $id): mixed
    {
        return State::whereId($id)->update($data);
    }

    public function delete($id): int
    {
        return State::destroy($id);
    }
}
