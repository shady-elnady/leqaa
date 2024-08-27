<?php

namespace App\Interfaces;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Collection;

interface SettingRepositoryInterface
{
    public function index(): Collection;
    public function getById($id): Setting;
    public function store(array $data): Setting;
    public function update(array $data, $id): mixed;
    public function delete($id): int;
}
