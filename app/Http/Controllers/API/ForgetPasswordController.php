<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\ForgetPasswordRequest;
use Core\Controllers\BaseApiController;
use Illuminate\Http\JsonResponse;
use App\Services\ActivationCodeService;
use App\Enums\UserTypesEnum;
use Modules\B00User\Models\Admin;
use Modules\B00User\Models\Lecturer;
use Modules\B00User\Models\Student;
use App\Models\User;

class ForgetPasswordController extends BaseApiController
{
    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function forgetPassword(ForgetPasswordRequest $request): JsonResponse
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

        ActivationCodeService::remove($request->mobile, $table);
        ActivationCodeService::generate($request->mobile, $table);

        // TODO: send sms to the phone with the dialing code

        return $this->sendJsonResponse(
            message: __('auth.code_sent')
        );
    }
}
