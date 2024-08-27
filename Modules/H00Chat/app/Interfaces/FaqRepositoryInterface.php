<?php

namespace Modules\H00Chat\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Modules\H00Chat\Models\Faq;

interface FaqRepositoryInterface
{
    public function index(): Collection;
    public function getById($id): Faq;
    public function store(array $data): Faq;
    public function update(array $data, $id): mixed;
    public function delete($id): int;
}
