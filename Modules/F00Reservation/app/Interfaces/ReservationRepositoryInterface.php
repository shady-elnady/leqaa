<?php

namespace Modules\F00Reservation\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Modules\F00Reservation\Models\Reservation;

interface ReservationRepositoryInterface
{
    public function index(): Collection;
    public function getById($id): Reservation;
    public function store(array $data): Reservation;
    public function update(array $data, $id): mixed;
    public function delete($id): int;
}
