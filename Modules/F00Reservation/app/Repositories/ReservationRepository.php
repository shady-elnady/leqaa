<?php

namespace Modules\F00Reservation\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\F00Reservation\Interfaces\ReservationRepositoryInterface;
use Modules\F00Reservation\Models\Reservation;

class ReservationRepository implements ReservationRepositoryInterface
{
    public function index(): Collection
    {
        return Reservation::all();
    }

    public function getById($id): Reservation
    {
        return Reservation::findOrFail($id);
    }

    public function store(array $data): Reservation
    {
        return Reservation::create($data);
    }

    public function update(array $data, $id): mixed
    {
        return Reservation::whereId($id)->update($data);
    }

    public function delete($id): int
    {
        return Reservation::destroy($id);
    }
}
