<?php

namespace Modules\B00User\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Core\Controllers\BaseApiController;
use Modules\B00User\Interfaces\StudentRepositoryInterface;
use Modules\B00User\Transformers\StudentResource;
use Modules\B00User\Http\Requests\StudentRequest;
use Modules\B00User\Models\Student;

class StudentController extends BaseApiController
{
    private StudentRepositoryInterface $studentRepositoryInterface;

    public function __construct(StudentRepositoryInterface $studentRepositoryInterface)
    {
        $this->studentRepositoryInterface = $studentRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->studentRepositoryInterface->index();

        return $this->sendJsonResponse(
            data: StudentResource::collection($data),
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
    public function store(StudentRequest $request)
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
            $event = $this->studentRepositoryInterface->store($details);

            DB::commit();
            return $this->sendJsonResponse(
                data: new StudentResource($event),
                message: __('Student Create Successful'),
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
        $event = $this->studentRepositoryInterface->getById($id);

        return $this->sendJsonResponse(
            data: new StudentResource($event),
            statusCode: 200,
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request, $id)
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
            $event = $this->studentRepositoryInterface->update($updateDetails, $id);

            DB::commit();
            return $this->sendJsonResponse(
                message: __('Student Update Successful'),
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
            $this->studentRepositoryInterface->delete($id);
            DB::commit();
            return $this->sendJsonResponse(
                message: __('Student Delete Successful'),
                statusCode: 204
            );
        } catch (\Exception $ex) {
            $this->rollback($ex, __('Student Delete Successful'));
        }
    }
}
