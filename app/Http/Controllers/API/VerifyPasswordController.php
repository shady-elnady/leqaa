<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\ForgetPasswordRequest;
use Core\Controllers\BaseApiController;
use Illuminate\Http\JsonResponse;
use App\Services\ActivationCodeService;
use App\Enums\UserTypesEnum;
use App\Http\Requests\Api\VerifyOTPRequest;
use Modules\B00User\Models\Admin;
use Modules\B00User\Models\Lecturer;
use Modules\B00User\Models\Student;
use App\Models\User;

class VerifyPasswordController extends BaseApiController
{
    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function __invoke(VerifyOTPRequest $request): JsonResponse
    {
        switch ($request->account_type) {
            case UserTypesEnum::User:
                $user = User::where('mobile', $request->mobile)->first();
                $table = 'users';
                break;
            case UserTypesEnum::Admin:
                $user = Admin::where('mobile', $request->mobile)->first();
                $table = 'b00user_admins';
                break;
            case UserTypesEnum::Lecturer:
                $user = Lecturer::where('mobile', $request->mobile)->first();
                $table = 'b00user_lecturers';
                break;
            case UserTypesEnum::Student:
                $user = Student::where('mobile', $request->mobile)->first();
                $table = 'b00user_students';
                break;
        }

        if (!$user) {
            return $this->sendJsonResponse(
                success: false,
                message: __('auth.phone'),
                statusCode: 404
            );
        }

        if (!ActivationCodeService::validate($request->mobile, $request->code, $table)) {
            return $this->sendJsonResponse(
                success: false,
                message: __('auth.invalid_code'),
                statusCode: 400
            );
        }

        ActivationCodeService::remove($request->phone, $table);

        $user->tokens()->delete();
        $data['token'] = $user->createToken('auth_token')->plainTextToken;

        return $this->sendJsonResponse(
            data: $data,
            message: __('auth.valid_code')
        );
    }
}
