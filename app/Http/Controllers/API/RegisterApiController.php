<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Core\Controllers\BaseApiController;
use Illuminate\Http\JsonResponse;
use Modules\B00User\Resources\AdminResource;
use Modules\B00User\Resources\LecturerResource;
use Modules\B00User\Resources\StudentResource;
use App\Http\Resources\UserResource;
use App\Enums\UserTypesEnum;
use App\Http\Requests\Api\RegisterRequest;
use Modules\B00User\Models\Admin;
use Modules\B00User\Models\Lecturer;
use Modules\B00User\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterApiController extends BaseApiController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(RegisterRequest $request): JsonResponse
    {
        $validatedData = $request->validated();

        $userType = $validatedData['account_type'];

        switch ($userType) {
            case UserTypesEnum::User->value:
                $model = User::class;
                $resource = UserResource::class;
                $userType = UserTypesEnum::User->value;
                break;
            case UserTypesEnum::Admin->value:
                $model = Admin::class;
                $resource = AdminResource::class;
                $userType = UserTypesEnum::Admin->value;
                break;
            case UserTypesEnum::Lecturer->value:
                $model = Lecturer::class;
                $resource = LecturerResource::class;
                $userType = UserTypesEnum::Lecturer->value;
                break;
            case UserTypesEnum::Student->value:
                $model = Student::class;
                $resource = StudentResource::class;
                $userType = UserTypesEnum::Student->value;
                break;
        }

        DB::beginTransaction();
        try {
            $user = $model::create(
                [
                    'mobile' => $validatedData['mobile'],
                    'email' => $validatedData['email'],
                    'password' => Hash::make($request->string($validatedData['email'])), //bcrypt($input['password']);
                ]
            );
            DB::commit();
            $data['user'] = $resource::make($user);
            return $this->sendJsonResponse(
                data: $data,
                message: __("{$userType} Created Successful"),
                statusCode: 201,
            );
        } catch (\Exception $ex) {
            return $this->rollback(
                $ex,
                __("Failed {$userType} Register")
            );
        }
    }
}
