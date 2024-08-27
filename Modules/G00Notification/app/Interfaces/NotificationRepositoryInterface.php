<?php

namespace Modules\G00Notification\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Modules\G00Notification\Models\Notification;

interface NotificationRepositoryInterface
{
    public function index(): Collection;
    public function getById($id): Notification;
    public function store(array $data): Notification;
    public function update(array $data, $id): mixed;
    public function delete($id): int;
}
