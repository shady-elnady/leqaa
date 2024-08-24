<?php

namespace App\Http\Controllers\Api;

use App\Enums\UserTypesEnum;
use Modules\B00User\Models\Admin;
use Modules\B00User\Models\Lecturer;
use Modules\B00User\Models\Student;
use App\Models\User;
use Core\Controllers\BaseApiController;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;
use Modules\B00User\Resources\AdminResource;
use Modules\B00User\Resources\LecturerResource;
use Modules\B00User\Resources\StudentResource;
use App\Resources\UserResource;

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
                $column = 'mobile';
                break;
            case UserTypesEnum::Admin->value:
                $model = Admin::class;
                $resource = AdminResource::class;
                $column = 'mobile';
                break;
            case UserTypesEnum::Lecturer->value:
                $model = Lecturer::class;
                $resource = LecturerResource::class;
                $column = 'mobile';
                break;
            case UserTypesEnum::Student->value:
                $model = Student::class;
                $resource = StudentResource::class;
                $column = 'mobile';
                break;
        }

        $user = $model::where(
            $column,
            $validatedData['mobile']
        )->first();

        if (!$user) {
            return $this->jsonResponse(
                message: __('auth.failed'),
                success: false,
                status: 401
            );
        }

        if (!$user->password || !Hash::check($request->password, $user->password)) {
            return $this->jsonResponse(
                message: __('auth.failed'),
                success: false,
                status: 401
            );
        }

        $data['user'] = $resource::make($user)->additional([
            'token' => $user->createToken($validatedData['mobile'])->plainTextToken,
        ]);

        return $this->jsonResponse(
            data: $data,
            status: 200
        );
    }
}
 /*
 /////////////////////////////////////////////////////////////////////////////////////////////////////////
        auth()->guard('student')->logout(); // Log out a regular user
        auth()->guard('admin')->logout(); // Log out an administrator
        ////////// Route File
        Route::middleware(['auth:student'])->group(function () {
            // Routes accessible to regular users
        });

        Route::middleware(['auth:admin'])->group(function () {
            // Routes accessible to administrators
        });

/////////////////////////////////////////////////////////////////////////////////////////////////////////
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] =  $user->createToken($validatedData['mobile'])->plainTextToken;
            $success['name'] =  $user->name;

            return $this->sendResponse($success, 'User login successfully.');
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
 */
