<?php

namespace Modules\H00Chat\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\H00Chat\Interfaces\MessageFileRepositoryInterface;
use Modules\H00Chat\Models\MessageFile;

class MessageFileRepository implements MessageFileRepositoryInterface
{
    public function index(): Collection
    {
        return MessageFile::all();
    }

    public function getById($id): MessageFile
    {
        return MessageFile::findOrFail($id);
    }

    public function store(array $data): MessageFile
    {
        return MessageFile::create($data);
    }

    public function update(array $data, $id): mixed
    {
        return MessageFile::whereId($id)->update($data);
    }

    public function delete($id): int
    {
        return MessageFile::destroy($id);
    }
}
