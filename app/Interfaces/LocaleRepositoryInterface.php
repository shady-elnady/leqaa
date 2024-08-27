<?php

namespace App\Interfaces;

use Locale;
use Illuminate\Database\Eloquent\Collection;

interface LocaleRepositoryInterface
{
    public function index(): Collection;
    public function getById($id): Locale;
    public function store(array $data): Locale;
    public function update(array $data, $id): mixed;
    public function delete($id): int;
}
