<?php

namespace Modules\E00Event\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Core\Controllers\BaseApiController;
use Modules\E00Event\Interfaces\EventRepositoryInterface;
use Modules\E00Event\Transformers\EventResource;
use Modules\E00Event\Http\Requests\EventRequest;
use Modules\E00Event\Models\Event;

class EventController extends BaseApiController
{
    private EventRepositoryInterface $eventRepositoryInterface;

    public function __construct(EventRepositoryInterface $eventRepositoryInterface)
    {
        $this->eventRepositoryInterface = $eventRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->eventRepositoryInterface->index();

        return $this->sendJsonResponse(
            data: EventResource::collection($data),
            statusCode: 200,
        );
        // return ApiResponseClass::sendResponse(EventResource::collection($data), '', 200);
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
    public function store(EventRequest $request)
    {
        $details = [
            'title' => $request->title,
            'hall' => $request->hall,
            'event_paid_status' => $request->event_paid_status,
            'university_id' => $request->university_id,
            'college_id' => $request->college_id,
            'organizer_id' => $request->organizer_id,
            'description' => $request->description,
            'Lecturer_id' => $request->Lecturer_id,
            'lecturer_Financial_dues' => $request->lecturer_Financial_dues,
            'lecturer_financial_system' => $request->lecturer_financial_system,
            'event_type_id' => $request->event_type_id,
            'category_id' => $request->category_id,
            'image' => $request->image,
            'event_status' => $request->event_status,
            'start_date_time' => $request->start_date_time,
        ];
        DB::beginTransaction();
        try {
            $event = $this->eventRepositoryInterface->store($details);

            DB::commit();
            return $this->sendJsonResponse(
                data: new EventResource($event),
                message: __('Event Create Successful'),
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
        $event = $this->eventRepositoryInterface->getById($id);

        return $this->sendJsonResponse(
            data: new EventResource($event),
            statusCode: 200,
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, $id)
    {
        $updateDetails = [
            'title' => $request->title,
            'hall' => $request->hall,
            'event_paid_status' => $request->event_paid_status,
            'university_id' => $request->university_id,
            'college_id' => $request->college_id,
            'organizer_id' => $request->organizer_id,
            'description' => $request->description,
            'Lecturer_id' => $request->Lecturer_id,
            'lecturer_Financial_dues' => $request->lecturer_Financial_dues,
            'lecturer_financial_system' => $request->lecturer_financial_system,
            'event_type_id' => $request->event_type_id,
            'category_id' => $request->category_id,
            'image' => $request->image,
            'event_status' => $request->event_status,
            'start_date_time' => $request->start_date_time,
        ];
        DB::beginTransaction();
        try {
            $event = $this->eventRepositoryInterface->update($updateDetails, $id);

            DB::commit();
            return $this->sendJsonResponse(
                message: __('Event Update Successful'),
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
            $this->eventRepositoryInterface->delete($id);
            DB::commit();
            return $this->sendJsonResponse(
                message: __('Event Delete Successful'),
                statusCode: 204
            );
        } catch (\Exception $ex) {
            $this->rollback($ex, __('Event Delete Successful'));
        }
    }
}
