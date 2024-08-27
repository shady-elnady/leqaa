<?php

namespace App\Http\Controllers\Common;

use App\Http\Requests\Api\ResendOTPRequest as ApiResendOTPRequest;
use App\Http\Requests\ResendOTPRequest;
use App\Models\User as ModelsUser;
use App\Services\ActivationCodeService;
use Core\Controllers\BaseApiController;
use Modules\B00User\Models\Admin;
use Modules\B00User\Models\Lecturer;
use Modules\B00User\Models\Student;
use App\Models\User;

class VerificationController extends BaseApiController
{
    public function __invoke(ApiResendOTPRequest $request)
    {
        $user = auth()->user();

        $table = match (get_class($user)) {
            User::class => 'users',
            Admin::class => 'b00user_admins',
            Lecturer::class => 'b00user_lecturers',
            Student::class => 'b00user_students',
            default => 'users',
        };

        ActivationCodeService::generate($request->mobile, $table);

        return $this->sendJsonResponse(
            message: __('auth.code_sent')
        );
    }
}
