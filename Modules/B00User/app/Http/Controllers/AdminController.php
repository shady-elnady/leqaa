<?php

namespace Modules\B00User\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Core\Controllers\BaseApiController;
use Modules\B00User\Interfaces\AdminRepositoryInterface;
use Modules\B00User\Transformers\AdminResource;
use Modules\B00User\Http\Requests\AdminRequest;
use Modules\B00User\Models\Admin;

class AdminController extends BaseApiController
{
    private AdminRepositoryInterface $adminRepositoryInterface;

    public function __construct(AdminRepositoryInterface $adminRepositoryInterface)
    {
        $this->adminRepositoryInterface = $adminRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->adminRepositoryInterface->index();

        return $this->sendJsonResponse(
            data: AdminResource::collection($data),
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
    public function store(AdminRequest $request)
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
            $event = $this->adminRepositoryInterface->store($details);

            DB::commit();
            return $this->sendJsonResponse(
                data: new AdminResource($event),
                message: __('Admin Create Successful'),
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
        $event = $this->adminRepositoryInterface->getById($id);

        return $this->sendJsonResponse(
            data: new AdminResource($event),
            statusCode: 200,
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, $id)
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
            $event = $this->adminRepositoryInterface->update($updateDetails, $id);

            DB::commit();
            return $this->sendJsonResponse(
                message: __('Admin Update Successful'),
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
            $this->adminRepositoryInterface->delete($id);
            DB::commit();
            return $this->sendJsonResponse(
                message: __('Admin Delete Successful'),
                statusCode: 204
            );
        } catch (\Exception $ex) {
            $this->rollback($ex, __('Admin Delete Successful'));
        }
    }
}
