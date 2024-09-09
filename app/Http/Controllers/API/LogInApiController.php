<?php

namespace App\Http\Controllers\Api;

use App\Enums\UserTypesEnum;
use Modules\B00User\Models\Admin;
use Modules\B00User\Models\Lecturer;
use Modules\B00User\Models\Student;
use App\Models\User;
use Core\Controllers\BaseApiController;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Api\LoginRequest;
use Modules\B00User\Resources\AdminResource;
use Modules\B00User\Resources\LecturerResource;
use Modules\B00User\Resources\StudentResource;
use App\Http\Resources\UserResource;

class LogInApiController extends BaseApiController
{

    public function __invoke(LoginRequest $request)
    {
        $validatedData = $request->validated();

        $userType = $validatedData['account_type'];

        switch ($userType) {
            case UserTypesEnum::User->value:
                $model = User::class;
                $resource = UserResource::class;
                break;
            case UserTypesEnum::Admin->value:
                $model = Admin::class;
                $resource = AdminResource::class;
                break;
            case UserTypesEnum::Lecturer->value:
                $model = Lecturer::class;
                $resource = LecturerResource::class;
                break;
            case UserTypesEnum::Student->value:
                $model = Student::class;
                $resource = StudentResource::class;
                break;
        }

        $user = $model::where(
            'email',
            $validatedData['email']
        )->first();

        if (!$user) {
            return $this->sendJsonResponse(
                message: __('auth.failed'),
                success: false,
                statusCode: 401
            );
        }

        if (!$user->is_active) {
            return $this->sendJsonResponse(
                message: __('auth.inactive'),
                success: false,
                statusCode: 401,
            );
        }

        if (
            !$user->password || !Hash::check(
                value: $request->password,
                hashedValue: $user->password,
                options: [
                    'memory' => 1024,
                    'time' => 2,
                    'threads' => 2,
                ],
            )
        ) {
            return $this->sendJsonResponse(
                message: __('auth.failed'),
                success: false,
                statusCode: 401
            );
        }

        $data['user'] = $resource::make($user)->additional([
            'token' => $user->createToken($validatedData['email'])->plainTextToken,
        ]);

        return $this->sendJsonResponse(
            data: $data,
            statusCode: 200,
        );
    }
}
