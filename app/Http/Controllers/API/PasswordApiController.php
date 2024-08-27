<?php

namespace App\Http\Controllers\Api;

use App\Enums\UserTypesEnum;
use App\Http\Requests\Api\verifyOTPRequest;
use App\Http\Requests\Api\ForgetPasswordRequest;
use App\Http\Requests\Api\ResetPasswordRequest;
use App\Models\User;
use App\Services\ActivationCodeService;
use Core\Controllers\BaseApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\B00User\Models\Admin;
use Modules\B00User\Models\Lecturer;
use Modules\B00User\Models\Student;

class PasswordApiController extends BaseApiController
{
    public function change(Request $request)
    {
        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return $this->jsonResponse(
                message: __('auth.current_password'),
                status: 401
            );
        }

        $request->validate([
            'new_password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);

        $user->update([
            'password' => $request->new_password
        ]);

        return $this->sendJsonResponse(
            message: __('messages.updated')
        );
    }

    public function forget(ForgetPasswordRequest $request)
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

    public function verify(verifyOTPRequest $request)
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

    public function reset(ResetPasswordRequest $request)
    {
        $user = auth()->user();

        $user->update([
            'password' => $request->new_password
        ]);

        return $this->sendJsonResponse(
            message: __('messages.updated')
        );
    }
}
