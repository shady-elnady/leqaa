<?php

namespace Modules\H00Chat\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\H00Chat\Interfaces\FaqRepositoryInterface;
use Modules\H00Chat\Models\Faq;

class FaqRepository implements FaqRepositoryInterface
{
    public function index(): Collection
    {
        return Faq::all();
    }

    public function getById($id): Faq
    {
        return Faq::findOrFail($id);
    }

    public function store(array $data): Faq
    {
        return Faq::create($data);
    }

    public function update(array $data, $id): mixed
    {
        return Faq::whereId($id)->update($data);
    }

    public function delete($id): int
    {
        return Faq::destroy($id);
    }
}
