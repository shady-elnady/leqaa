<?php

namespace Modules\B00User\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Core\Controllers\BaseApiController;
use Modules\B00User\Interfaces\LecturerRepositoryInterface;
use Modules\B00User\Transformers\LecturerResource;
use Modules\B00User\Http\Requests\LecturerRequest;
use Modules\B00User\Models\Lecturer;

class LecturerController extends BaseApiController
{
    private LecturerRepositoryInterface $lecturerRepositoryInterface;

    public function __construct(LecturerRepositoryInterface $lecturerRepositoryInterface)
    {
        $this->lecturerRepositoryInterface = $lecturerRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->lecturerRepositoryInterface->index();

        return $this->sendJsonResponse(
            data: LecturerResource::collection($data),
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
    public function store(LecturerRequest $request)
    {
        $details = [
            'title' => $request->title,
            'name' => $request->name,
            'avatar' => $request->avatar,
            'gender' => $request->gender,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => $request->password,
            'is_active' => $request->is_active,
            'is_blocked' => $request->is_blocked,
            'email_verified_at' => $request->email_verified_at,
            'mobile_verified_at' => $request->mobile_verified_at,
            'last_login' => $request->last_login,
            'contact_info' => $request->contact_info,
            'birth_date' => $request->birth_date,
            'university_number' => $request->university_number,
            'is_graduate' => $request->is_graduate,
        ];
        DB::beginTransaction();
        try {
            $event = $this->lecturerRepositoryInterface->store($details);

            DB::commit();
            return $this->sendJsonResponse(
                data: new LecturerResource($event),
                message: __('Lecturer Create Successful'),
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
        $event = $this->lecturerRepositoryInterface->getById($id);

        return $this->sendJsonResponse(
            data: new LecturerResource($event),
            statusCode: 200,
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lecturer $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LecturerRequest $request, $id)
    {
        $updateDetails = [
            'title' => $request->title,
            'name' => $request->name,
            'avatar' => $request->avatar,
            'gender' => $request->gender,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => $request->password,
            'is_active' => $request->is_active,
            'is_blocked' => $request->is_blocked,
            'email_verified_at' => $request->email_verified_at,
            'mobile_verified_at' => $request->mobile_verified_at,
            'last_login' => $request->last_login,
            'contact_info' => $request->contact_info,
            'birth_date' => $request->birth_date,
            'university_number' => $request->university_number,
            'is_graduate' => $request->is_graduate,
        ];
        DB::beginTransaction();
        try {
            $event = $this->lecturerRepositoryInterface->update($updateDetails, $id);

            DB::commit();
            return $this->sendJsonResponse(
                message: __('Lecturer Update Successful'),
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
            $this->lecturerRepositoryInterface->delete($id);
            DB::commit();
            return $this->sendJsonResponse(
                message: __('Lecturer Delete Successful'),
                statusCode: 204
            );
        } catch (\Exception $ex) {
            $this->rollback($ex, __('Lecturer Delete Successful'));
        }
    }
}
