<?php

namespace Modules\G00Notification\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\G00Notification\Interfaces\NotificationRepositoryInterface;
use Modules\G00Notification\Models\Notification;

class NotificationRepository implements NotificationRepositoryInterface
{
    public function index(): Collection
    {
        return Notification::all();
    }

    public function getById($id): Notification
    {
        return Notification::findOrFail($id);
    }

    public function store(array $data): Notification
    {
        return Notification::create($data);
    }

    public function update(array $data, $id): mixed
    {
        return Notification::whereId($id)->update($data);
    }

    public function delete($id): int
    {
        return Notification::destroy($id);
    }
}
