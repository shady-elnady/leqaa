<?php

namespace App\Http\Controllers\Api;

use Core\Controllers\BaseApiController;
use Illuminate\Support\Facades\Auth;

class LogOutApiController extends BaseApiController
{
    public function logOut()
    {
        auth()->user()->currentAccessToken()->delete();
        // auth()->user()->tokens()->delete();
        Auth::guard('web')->logout();
        return $this->jsonResponse(
            message: __('auth.logged_out')
        );
    }
}
