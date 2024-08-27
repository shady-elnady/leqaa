<?php

namespace Modules\E00Event\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Core\Controllers\BaseApiController;
use Modules\E00Event\Interfaces\EventTypeRepositoryInterface;
use Modules\E00Event\Transformers\EventTypeResource;
use Modules\E00Event\Http\Requests\EventTypeRequest;
use Modules\E00Event\Models\Event;

class EventTypeController extends BaseApiController
{
    private EventTypeRepositoryInterface $eventTypeRepositoryInterface;

    public function __construct(EventTypeRepositoryInterface $eventTypeRepositoryInterface)
    {
        $this->eventTypeRepositoryInterface = $eventTypeRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->eventTypeRepositoryInterface->index();

        return $this->sendJsonResponse(
            data: EventTypeResource::collection($data),
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
    public function store(EventTypeRequest $request)
    {
        $details = [
            'image' => $request->image,
            'translations' => $request->translations,
        ];

        DB::beginTransaction();
        try {
            $event = $this->eventTypeRepositoryInterface->store($details);

            DB::commit();
            return $this->sendJsonResponse(
                data: new EventTypeResource($event),
                message: __('Event Type Create Successful'),
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
        $event = $this->eventTypeRepositoryInterface->getById($id);

        return $this->sendJsonResponse(
            data: new EventTypeResource($event),
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
    public function update(EventTypeRequest $request, $id)
    {
        $updateDetails = [
            'image' => $request->image,
            'translations' => $request->translations,
        ];
        DB::beginTransaction();
        try {
            $eventType = $this->eventTypeRepositoryInterface->update($updateDetails, $id);

            DB::commit();
            return $this->sendJsonResponse(
                message: __('Event Type Update Successful'),
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
            $this->eventTypeRepositoryInterface->delete($id);
            DB::commit();
            return $this->sendJsonResponse(
                message: __('Event Type Delete Successful'),
                statusCode: 204
            );
        } catch (\Exception $ex) {
            $this->rollback($ex, __('Event Type Delete Successful'));
        }
    }
}
