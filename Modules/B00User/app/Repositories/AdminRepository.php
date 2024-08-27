<?php

namespace Modules\B00User\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\B00User\Interfaces\AdminRepositoryInterface;
use Modules\B00User\Models\Admin;

class AdminRepository implements AdminRepositoryInterface
{
    public function index(): Collection
    {
        return Admin::all();
    }

    public function getById($id): Admin
    {
        return Admin::findOrFail($id);
    }

    public function store(array $data): Admin
    {
        return Admin::create($data);
    }

    public function update(array $data, $id): mixed
    {
        return Admin::whereId($id)->update($data);
    }

    public function delete($id): int
    {
        return Admin::destroy($id);
    }
}
