<?php

namespace Modules\F00Reservation\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Core\Controllers\BaseApiController;
use Modules\F00Reservation\Interfaces\ReservationRepositoryInterface;
use Modules\F00Reservation\Transformers\ReservationResource;
use Modules\F00Reservation\Http\Requests\ReservationRequest;
use Modules\F00Reservation\Models\Reservation;


class ReservationController extends BaseApiController
{
    private ReservationRepositoryInterface $reservationRepositoryInterface;

    public function __construct(ReservationRepositoryInterface $reservationRepositoryInterface)
    {
        $this->reservationRepositoryInterface = $reservationRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->reservationRepositoryInterface->index();

        return $this->sendJsonResponse(
            data: ReservationResource::collection($data),
            statusCode: 200,
        );
        // return ApiResponseClass::sendResponse(reservationResource::collection($data), '', 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationRequest $request)
    {
        $details = [
            'event_id'  => $request->event_id,
            'student_id'  => $request->student_id,
            'reservation_status'  => $request->reservation_status,
            'canceled_reason'  => $request->canceled_reason,
            'rate'  => $request->rate,
            'comment'  => $request->comment,
        ];
        DB::beginTransaction();
        try {
            $reservation = $this->reservationRepositoryInterface->store($details);

            DB::commit();
            return $this->sendJsonResponse(
                data: new ReservationResource($reservation),
                message: __('Reservation Create Successful'),
                statusCode: 201,
            );
        } catch (\Exception $ex) {
            return $this->rollback($ex);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $reservation = $this->reservationRepositoryInterface->getById($id);

        return $this->sendJsonResponse(
            data: new ReservationResource($reservation),
            statusCode: 200,
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReservationRequest $request, $id)
    {
        $updateDetails = [
            'event_id'  => $request->event_id,
            'student_id'  => $request->student_id,
            'reservation_status'  => $request->reservation_status,
            'canceled_reason'  => $request->canceled_reason,
            'rate'  => $request->rate,
            'comment'  => $request->comment,
        ];
        DB::beginTransaction();
        try {
            $reservation = $this->reservationRepositoryInterface->update($updateDetails, $id);

            DB::commit();
            return $this->sendJsonResponse(
                message: __('Reservation Update Successful'),
                statusCode: 201,
            );
        } catch (\Exception $ex) {
            return $this->rollback($ex);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $this->reservationRepositoryInterface->delete($id);
            DB::commit();
            return $this->sendJsonResponse(
                message: __('Reservation Delete Successful'),
                statusCode: 204
            );
        } catch (\Exception $ex) {
            $this->rollback($ex, __('Reservation Delete Successful'));
        }
    }
}
