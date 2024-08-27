<?php

namespace Modules\E00Event\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Core\Controllers\BaseApiController;
use Modules\E00Event\Interfaces\EventPhotoRepositoryInterface;
use Modules\E00Event\Transformers\EventPhotoResource;
use Modules\E00Event\Http\Requests\EventPhotoRequest;
use Modules\E00Event\Models\Event;

class EventPhotoController extends BaseApiController
{
    private EventPhotoRepositoryInterface $eventPhotoRepositoryInterface;

    public function __construct(EventPhotoRepositoryInterface $eventPhotoRepositoryInterface)
    {
        $this->eventPhotoRepositoryInterface = $eventPhotoRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->eventPhotoRepositoryInterface->index();

        return $this->sendJsonResponse(
            data: EventPhotoResource::collection($data),
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
    public function store(EventPhotoRequest $request)
    {
        $details = [
            'event_id' => $request->event_id,
            'image' => $request->image,
            'order' => $request->order,
        ];
        DB::beginTransaction();
        try {
            $event = $this->eventPhotoRepositoryInterface->store($details);

            DB::commit();
            return $this->sendJsonResponse(
                data: new EventPhotoResource($event),
                message: __('Event Photo Create Successful'),
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
        $event = $this->eventPhotoRepositoryInterface->getById($id);

        return $this->sendJsonResponse(
            data: new EventPhotoResource($event),
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
    public function update(EventPhotoRequest $request, $id)
    {
        $updateDetails = [
            'event_id' => $request->event_id,
            'image' => $request->image,
            'order' => $request->order,
        ];
        DB::beginTransaction();
        try {
            $event = $this->eventPhotoRepositoryInterface->update($updateDetails, $id);

            DB::commit();
            return $this->sendJsonResponse(
                message: __('Event Photo Update Successful'),
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
            $this->eventPhotoRepositoryInterface->delete($id);
            DB::commit();
            return $this->sendJsonResponse(
                message: __('Event Photo Delete Successful'),
                statusCode: 204
            );
        } catch (\Exception $ex) {
            $this->rollback($ex, __('Event Photo Delete Successful'));
        }
    }
}
