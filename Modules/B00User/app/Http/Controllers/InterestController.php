<?php

namespace Modules\B00User\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Core\Controllers\BaseApiController;
use Modules\B00User\Interfaces\InterestRepositoryInterface;
use Modules\B00User\Transformers\InterestResource;
use Modules\B00User\Http\Requests\InterestRequest;
use Modules\B00User\Models\Interest;

class InterestController extends BaseApiController
{
    private InterestRepositoryInterface $interestRepositoryInterface;

    public function __construct(InterestRepositoryInterface $interestRepositoryInterface)
    {
        $this->interestRepositoryInterface = $interestRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->interestRepositoryInterface->index();

        return $this->sendJsonResponse(
            data: InterestResource::collection($data),
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
    public function store(InterestRequest $request)
    {
        $details = [
            'student_id' => $request->student_id,
            'category_id' => $request->category_id,
            'order' => $request->order,
        ];
        DB::beginTransaction();
        try {
            $event = $this->interestRepositoryInterface->store($details);

            DB::commit();
            return $this->sendJsonResponse(
                data: new InterestResource($event),
                message: __('Interest Create Successful'),
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
        $event = $this->interestRepositoryInterface->getById($id);

        return $this->sendJsonResponse(
            data: new InterestResource($event),
            statusCode: 200,
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Interest $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InterestRequest $request, $id)
    {
        $updateDetails = [
            'student_id' => $request->student_id,
            'category_id' => $request->category_id,
            'order' => $request->order,
        ];
        DB::beginTransaction();
        try {
            $event = $this->interestRepositoryInterface->update($updateDetails, $id);

            DB::commit();
            return $this->sendJsonResponse(
                message: __('Interest Update Successful'),
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
            $this->interestRepositoryInterface->delete($id);
            DB::commit();
            return $this->sendJsonResponse(
                message: __('Interest Delete Successful'),
                statusCode: 204
            );
        } catch (\Exception $ex) {
            $this->rollback($ex, __('Interest Delete Successful'));
        }
    }
}
