<?php

namespace Modules\H00Chat\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\H00Chat\Interfaces\MessageRepositoryInterface;
use Modules\H00Chat\Models\Message;

class MessageRepository implements MessageRepositoryInterface
{
    public function index(): Collection
    {
        return Message::all();
    }

    public function getById($id): Message
    {
        return Message::findOrFail($id);
    }

    public function store(array $data): Message
    {
        return Message::create($data);
    }

    public function update(array $data, $id): mixed
    {
        return Message::whereId($id)->update($data);
    }

    public function delete($id): int
    {
        return Message::destroy($id);
    }
}
